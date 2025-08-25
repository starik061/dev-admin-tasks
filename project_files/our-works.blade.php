@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')


<section class="container container-base">
    <h1 class="reviews__title">@lang('message.our_works')</h1>

        <div class="container-fluid container-fluid-base" id="custom_output_portfolio">
            <div class="row no-gutters">
                <div class="container container-base">
                    <div class="row no-gutters">
                        <div class="image-container-custom2" id="image-container-custom2">
                            <!-- Images will be inserted here by JavaScript -->
                        </div>
                        <div class="custom-portfolio-buttons-block">
                            <button class="show-less-btn-custom" id="show-less-button-custom">@lang('message.show-less')</button>
                            <button class="load-more-btn-custom" id="load-more-button-custom">@lang('message.show-more')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@include('add.footer')

<!-- Portfolio -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageContainer = document.getElementById('image-container-custom2');

        if (imageContainer) {
            let images = [];
            let currentPage = 1;
            let imagesPerPage = getImagesPerPage();
            let currentImageIndex = -1; // Track the index of the currently displayed image

            let touchStartX = 0; // Starting X coordinate for touch
            let touchEndX = 0; // Ending X coordinate for touch

            function getImagesPerPage() {
                if (window.innerWidth <= 784) {
                    return 6;
                } else if (window.innerWidth <= 1023) {
                    return 8;
                } else {
                    return 15;
                }
            }

            window.addEventListener('resize', () => {
                imagesPerPage = getImagesPerPage();
                currentPage = 1;
                renderImages('1');
            });

            function fetchImages() {
                fetch(`/get-instagram-posts`)
                    .then(response => response.json())
                    .then(data => {
                        images = data;
                        renderImages('2');
                    })
                    .catch(error => console.error('Error fetching images:', error));
            }

            function renderImages(xy = '') {
                const imageContainer = document.getElementById('image-container-custom2');

                if (imageContainer) {
                    imageContainer.innerHTML = '';

                    const startIndex = (currentPage - 1) * imagesPerPage;
                    const endIndex = startIndex + imagesPerPage;
                    const imagesToRender = images.slice(0, endIndex);

                    imagesToRender.forEach((image, index) => {
                        const imgElement = document.createElement('img');
                        const imagePath = image.src.startsWith('storage/') ? `/${image.src}` : image.src;
                        imgElement.src = `${window.location.origin}${imagePath}`;
                        imgElement.addEventListener('click', () => openModal(imgElement.src, index));

                        imageContainer.appendChild(imgElement);
                    });

                    const loadMoreButton = document.getElementById('load-more-button-custom');
                    const showLessButton = document.getElementById('show-less-button-custom');

                    if (endIndex >= images.length) {
                        loadMoreButton.style.display = 'none';
                    } else {
                        loadMoreButton.style.display = 'block';
                    }

                    if (currentPage === 1) {
                        showLessButton.style.display = 'none';
                        loadMoreButton.style.width = '100%';
                    } else {
                        showLessButton.style.display = 'block';
                        loadMoreButton.style.width = 'calc(50% - 5px)';
                    }
                }
            }

            function openModal(imageSrc, index) {
                console.log('Receive ' + imageSrc)

                currentImageIndex = index; // Update the current image index
                const modal = document.getElementById('imageModal');
                const modalImage = document.getElementById('modalImage');
                modal.style.display = 'block';
                modalImage.src = imageSrc;

                updateImageNavigationButtons();
            }

            document.getElementById('modalClose').addEventListener('click', () => {
                const modal = document.getElementById('imageModal');
                modal.style.display = 'none';
            });

            document.getElementById('imageModal').addEventListener('click', (event) => {
                const modalContent = document.getElementById('modalImage');
                if (event.target !== modalContent) {
                    const modal = document.getElementById('imageModal');
                    modal.style.display = 'none';
                }
            });
            document.getElementById('prevImage').addEventListener('click', (event) => {
                event.stopPropagation();  // Prevent the modal from closing
                if (currentImageIndex > 0) {
                    currentImageIndex--;
                    updateModalImage();
                    updateImageNavigationButtons();
                }
            });
            document.getElementById('nextImage').addEventListener('click', (event) => {
                event.stopPropagation();  // Prevent the modal from closing
                const lastIndexOnCurrentPage = currentPage * imagesPerPage - 1;

                if (currentImageIndex < lastIndexOnCurrentPage) {
                    // Если текущий индекс меньше последнего индекса на текущей странице, просто переходим к следующему изображению
                    currentImageIndex++;
                    updateModalImage();
                    updateImageNavigationButtons();
                } else {
                    // Если мы находимся на последнем изображении текущей страницы, кликаем по кнопке "Загрузить ещё"
                    document.getElementById('load-more-button-custom').click();
                    currentImageIndex++;
                    updateModalImage();
                    updateImageNavigationButtons();
                }
            });

            function updateModalImage() {
                const modalImage = document.getElementById('modalImage');

                // Убираем текущие классы анимации
                modalImage.classList.remove('swipe-left', 'swipe-right', 'swipe-in');

                // Выбираем направление свайпа
                const swipeDirection = currentImageIndex > previousImageIndex ? 'swipe-right' : 'swipe-left';

                // Добавляем класс для анимации исчезновения
                modalImage.classList.add(swipeDirection);

                // Ждем завершения анимации, затем обновляем изображение
                setTimeout(() => {
                    const imagePath = images[currentImageIndex].src.startsWith('storage/')
                        ? `/${images[currentImageIndex].src}`
                        : images[currentImageIndex].src;

                    modalImage.src = `${window.location.origin}${imagePath}`; // Формируем полный путь
                    console.log('Second here ' + modalImage.src);

                    modalImage.classList.remove(swipeDirection); // Убираем старую анимацию
                    modalImage.classList.add('swipe-in'); // Добавляем анимацию появления
                }, 400); // Длительность должна совпадать с transition в CSS
            }


            // Обновляем предыдущий индекс после завершения перехода
            let previousImageIndex = -1;

            function updateImageNavigationButtons() {
                const prevButton = document.getElementById('prevImage');
                const nextButton = document.getElementById('nextImage');

                // Обновляем кнопки "назад" и "вперед"
                prevButton.disabled = currentImageIndex === 0;
                nextButton.disabled = currentImageIndex === images.length - 1;

                // Обновляем предыдущий индекс
                previousImageIndex = currentImageIndex;
            }

            // Keyboard navigation for left/right arrows
            window.addEventListener('keydown', (event) => {
                if (event.key === 'ArrowLeft') { // Left arrow key
                    if (currentImageIndex > 0) {
                        currentImageIndex--;
                        updateModalImage();
                        updateImageNavigationButtons();
                    }
                } else if (event.key === 'ArrowRight') { // Right arrow key
                    if (currentImageIndex < images.length - 1) {
                        currentImageIndex++;
                        updateModalImage();
                        updateImageNavigationButtons();
                    }
                }
            });

            // Swipe navigation for mobile devices
            const modal = document.getElementById('imageModal');
            modal.addEventListener('touchstart', (event) => {
                touchStartX = event.changedTouches[0].screenX;
            });

            modal.addEventListener('touchend', (event) => {
                touchEndX = event.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50; // Minimum distance for a swipe to be detected
                if (touchEndX < touchStartX - swipeThreshold) {
                    // Swipe left
                    if (currentImageIndex < images.length - 1) {
                        currentImageIndex++;
                        updateModalImage();
                        updateImageNavigationButtons();
                    }
                } else if (touchEndX > touchStartX + swipeThreshold) {
                    // Swipe right
                    if (currentImageIndex > 0) {
                        currentImageIndex--;
                        updateModalImage();
                        updateImageNavigationButtons();
                    }
                }
            }

            let x = document.getElementById('load-more-button-custom');
            if (x) {
                x.addEventListener('click', (event) => {
                    event.preventDefault();
                    currentPage++;
                    renderImages('true');
                });
            }

            let y = document.getElementById('show-less-button-custom');
            if (y) {
                y.addEventListener('click', (event) => {
                    event.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        renderImages('5');
                    }
                });

            }
            fetchImages();
        }
    });
</script>

<style>
    /* Адаптивные стили для разных экранов */
    @media (min-width: 1200px) {
        .custom-portfolio-buttons-block {
            width: 100%;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 30%;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 1199px) and (min-width: 768px) {
        .custom-portfolio-buttons-block {
            width: 100%;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 30%;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 767px) {
        .custom-portfolio-buttons-block {
            width: 100%;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 8%;
            margin-bottom: 20px;

        }
    }


    /* Стили для кнопки "Ещё" */
    .load-more-btn-custom {
        display: block;
        width: 100%;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        background-color: #FC6B40;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Стили для кнопки "Меньше" */
    .show-less-btn-custom {
        display: none;
        width: 100%;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        flex: 1;
        color: #3D445C;
        background-color: #E8EBF1;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .load-more-btn-custom:hover {
        background-color: #e95a35;
    }

    .load-more-btn-custom:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    /* Убираем обводку при фокусе */
    .load-more-btn-custom,
    .show-less-btn-custom {
        outline: none;
    }

    /* Для надежности можно добавить сброс box-shadow */
    .load-more-btn-custom:focus,
    .show-less-btn-custom:focus {
        outline: none;
        box-shadow: none;
    }


    /* Общие стили для контейнера изображений */
    .image-container-custom2 {
        display: flex;
        flex-wrap: wrap;
        gap: 0.2%;
        justify-content: center;
        width: 100%;
        margin-bottom: 20px; /* Пространство между изображениями и пагинацией */
    }

    /* Стили для изображений с одинаковым размером и пропорциями */
    .image-container-custom2 img {
        width: 100%;
        max-width: 190px; /* Ограничение максимальной ширины */
        height: 190px; /* Установка фиксированной высоты */
        object-fit: cover; /* Изображения заполняют контейнер, сохраняя пропорции */
        border-radius: 5px;
        padding: 5px;
        cursor: pointer; /* Курсор в виде руки при наведении */
    }

    /* Адаптивные стили для разных экранов */
    @media (min-width: 1200px) {
        .image-container-custom2 img {
            flex: 1 0 calc((100% - 60px) / 5);
        }
    }

    @media (max-width: 1199px) and (min-width: 755px) {
        .image-container-custom2 img {
            flex: 1 0 calc((100% - 45px) / 3);
            height: 183px;
            max-width: 183px;
        }
    }

    @media (max-width: 754px) {
        .image-container-custom2 img {
            flex: 1 0 calc((100% - 30px) / 2);
            height: 170px; /* Установка фиксированной высоты */
            max-width: 170px; /* Ограничение максимальной ширины */
        }
    }

    /* Pagination Styles */
    .custom-pagination {
        width: 100%;
        display: flex;
        justify-content: space-between;
        list-style: none;
        padding: 0;
        margin-top: 20px; /* Add some space above pagination */
    }

    .pagination-prev,
    .pagination-next {
        display: flex;
    }

    .pagination-pages {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-page-item {
        margin: 0 5px;
    }

    .custom-page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        /*border: 1px solid transparent;*/
        text-decoration: none;
        background-color: #f8f9fa;
        font-weight: bold;
        transition: background-color 0.2s, color 0.2s;
    }

    .custom-page-link:hover {
        background-color: #e9ecef;
    }

    .custom-page-item.active .custom-page-link {
        color: #fff;
        background-color: #FC6B40;
    }

    .custom-page-item.disabled .custom-page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: not-allowed;
    }

    .custom-page-item.disabled .custom-page-link.prev {
        pointer-events: none;
        cursor: not-allowed;
    }

    .custom-page-item.disabled .custom-page-link.next {
        pointer-events: none;
        cursor: not-allowed;
    }

    /* Modal Styles */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
    }

    .custom-modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90%; /* Максимальная ширина 90% от экрана */
        max-height: 90%; /* Максимальная высота 90% от экрана */
        width: 60%; /* Фиксированная ширина 60% от экрана */
        height: auto; /* Высота изображения будет адаптироваться */
        border: none;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .custom-modal img {
        width: 100%; /* Изображение растягивается на 100% по ширине контейнера */
        height: auto; /* Высота сохраняет пропорции */
        max-width: 100%; /* Ограничение максимальной ширины */
        max-height: 40%; /* Ограничение максимальной высоты */
        min-height: 30%;
    }

    .custom-modal-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }

    .custom-modal-close:hover,
    .custom-modal-close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .custom-page-link:hover {
        color: inherit; /* Убираем изменение цвета текста */
        text-decoration: none; /* Убираем подчеркивание */
    }

    .modal-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 30px;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 50%;
        z-index: 100;
    }

    .modal-nav-btn.prev {
        left: 10px;
    }

    .modal-nav-btn.next {
        right: 10px;
    }

    .modal-nav-btn:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .custom-modal-content {
            width: 80%; /* Уменьшаем ширину для меньших экранов */
        }

        .custom-modal img {
            max-width: 100%; /* Убедитесь, что изображение не выходит за пределы контейнера */
        }
    }

    @media (max-width: 480px) {
        .custom-modal-content {
            width: 90%; /* Еще больше уменьшаем ширину для мобильных устройств */
        }

        .modal-nav-btn {
            font-size: 24px; /* Уменьшаем размер кнопок навигации */
            padding: 8px;
        }
    }

    /* Modal Container */
    #imageModal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }

    /* Modal Image */
    #modalImage {
        max-width: 80%;
        max-height: 80%;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    /* Close Button */
    #modalClose {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 20px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    #modalClose:hover {
        color: #FC6B40;
    }

    /* Navigation Buttons */
    #prevImage,
    #nextImage {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 30px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    #prevImage {
        left: 10px;
    }

    #nextImage {
        right: 10px;
    }

    #prevImage:hover,
    #nextImage:hover {
        color: #FC6B40;
    }

    #prevImage:disabled,
    #nextImage:disabled {
        color: #555;
        cursor: not-allowed;
    }

    /* Animations */
    .swipe-left {
        transform: translateX(-100%);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .swipe-right {
        transform: translateX(100%);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .swipe-in {
        transform: translateX(0);
        opacity: 1;
        transition: all 0.4s ease;
    }


</style>
<!-- End Portfolio -->