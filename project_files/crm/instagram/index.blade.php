@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<div class="container">
    <div style="margin-top: 10px;">
        <h1>{{ __("message.instagram-posts") }}</h1>
        <form action="{{ route('instagram.update-posts') }}" method="POST">
            @csrf
            <button type="submit" class="crm-button">@lang('message.update-posts')</button>
        </form>
    </div>
    <hr>

    <div style="margin-top: 10px;">
        <h1>@lang('message.manual_images_upload')</h1>
        <button type="button" id="manual-upload-btn" class="crm-button">@lang('message.select_images')</button>
        <input type="file" id="manual-upload-input" multiple accept="image/*" style="display: none;">
        <ul id="preview-list" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; padding-left: 0;"></ul>
        <button id="upload-all-btn" type="button" class="crm-button" style="margin-top: 15px; display: none;">@lang('message.upload_selected')</button>
    </div>

    <hr>
    <div class="posts-container">
        @foreach($posts as $post)
            <div class="post-item {{ $post->active ? '' : 'inactive' }}" data-id="{{ $post->id }}">
                <img src="{{ asset($post->local_path) }}" alt="Instagram Post">
                <div class="actions">
                    <label class="switch">
                        <input type="checkbox" class="toggle-active" data-id="{{ $post->id }}" {{ $post->active ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>

@include('add.footer')

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .posts-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .post-item {
        flex: 1 1 calc(25% - 20px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        text-align: center;
        margin: 10px;
        position: relative;
    }

    .post-item.inactive::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .post-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .actions {
        padding: 10px;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(14px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    @media (max-width: 768px) {
        .post-item {
            flex: 1 1 calc(50% - 20px);
        }
    }

    @media (max-width: 480px) {
        .post-item {
            flex: 1 1 100%;
        }
    }
</style>
<style>
    #preview-list li {
        position: relative;
        list-style: none;
        border: 1px solid #ccc;
        border-radius: 6px;
        overflow: hidden;
        width: 150px;
        height: 150px;
        background: #f9f9f9;
    }

    #preview-list img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .remove-preview {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 14px;
        cursor: pointer;
        line-height: 20px;
        text-align: center;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.toggle-active');

        toggles.forEach(toggle => {
            toggle.addEventListener('change', function () {
                const postId = this.dataset.id;
                const active = this.checked ? 1 : 0;
                const successMessage = "{{__('message.post-visibility-success')}}";
                const errorMessage = "{{__('message.post-visibility-failed')}}";

                fetch(`/manager/instagram/update-active/${postId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ active })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(successMessage);
                        } else {
                            alert(errorMessage);
                        }
                    });
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const uploadBtn = document.getElementById('manual-upload-btn');
        const uploadInput = document.getElementById('manual-upload-input');
        const previewList = document.getElementById('preview-list');
        const uploadAllBtn = document.getElementById('upload-all-btn');

        let selectedFiles = [];

        uploadBtn.addEventListener('click', () => uploadInput.click());

        uploadInput.addEventListener('change', function () {
            const files = Array.from(this.files);

            files.forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const li = document.createElement('li');
                    li.innerHTML = `
                    <img src="${e.target.result}" alt="preview">
                    <button class="remove-preview">&times;</button>
                `;
                    previewList.appendChild(li);

                    const removeBtn = li.querySelector('.remove-preview');
                    removeBtn.addEventListener('click', () => {
                        const index = selectedFiles.indexOf(file);
                        if (index > -1) {
                            selectedFiles.splice(index, 1);
                        }
                        li.remove();
                        if (selectedFiles.length === 0) {
                            uploadAllBtn.style.display = 'none';
                        }
                    });
                };
                reader.readAsDataURL(file);
                selectedFiles.push(file);
            });

            if (selectedFiles.length > 0) {
                uploadAllBtn.style.display = 'inline-block';
            }
        });

        uploadAllBtn.addEventListener('click', async () => {
            uploadAllBtn.disabled = true;
            $('body').append('<div class="global-loader"></div>');

            const formData = new FormData();
            selectedFiles.forEach(file => {
                formData.append('images[]', file);
            });

            try {
                const response = await fetch("{{ route('instagram.upload-manual') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                const data = await response.json();
                $('.global-loader').remove();

                if (data.success) {
                    toastr.success("Файлы успешно загружены");
                    setTimeout(() => window.location.reload(), 500);
                } else {
                    toastr.error("Ошибка загрузки");
                    uploadAllBtn.disabled = false;
                }
            } catch (error) {
                console.error(error);
                $('.global-loader').remove();
                toastr.error("Ошибка при отправке запроса");
                uploadAllBtn.disabled = false;
            }
        });

    });
</script>

@include('front.crm.scripts')
