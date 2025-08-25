<div class="popup-data">
    <div class="act-popup-title">
        <h2>@lang('message.call_transcription')</h2>
        <div class="call-start-time">
            <strong>{{ \Carbon\Carbon::parse($call->call_start)->format('Y-m-d H:i:s') }}</strong>
        </div>
    </div>

    <div class="boards-table">
        <div class="boards-table-tbody" id="transcription-container">
            <div class="boards-table-thead">
                <div class="boards-table-th">@lang('message.answer')</div>
            </div>

            @foreach($answers as $answer)
                <div class="custom-boards-table-tr">
                    <div class="custom-boards-td custom-boards-td-answer">
                        {{ $answer }}
                    </div>
                </div>
                <div class="log-divider"></div> <!-- Line to separate answers -->
            @endforeach
        </div>
    </div>
</div>

<style>
    .mfp-inline-holder .mfp-content, .mfp-ajax-holder .mfp-content {
        width: 40% !important;
        cursor: auto;
        border-radius: 10px;
    }

    .act-popup-title {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .call-start-time {
        font-size: 14px; /* Adjust font size as needed */
        color: #666; /* Adjust color as needed */
    }

    .boards-table {
        width: 100%;
        border-collapse: collapse;
    }

    .boards-table-thead {
        display: flex;
        border-bottom: 2px solid #E8EBF1;
    }

    .boards-table-th {
        flex: 1;
        padding: 10px;
        font-weight: normal;
        font-size: 14px; /* Font size adjusted for better readability */
    }

    #transcription-container {
        max-height: 400px; /* Set the max height for the container */
        overflow-y: auto; /* Enable vertical scrolling */
    }

    .boards-table-tbody {
        display: flex;
        flex-direction: column;
    }

    .custom-boards-table-tr {
        display: flex;
        border-bottom: 1px solid #E8EBF1; /* Light border to separate rows */
    }

    .custom-boards-td {
        flex: 1;
        padding: 10px;
    }

    .custom-boards-td-answer {
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal; /* Ensure text wraps within the container */
        overflow-wrap: break-word; /* Break long words if necessary */
    }

    .log-divider {
        border-top: 1px solid #E8EBF1; /* Light border to separate logs */
        margin: 5px 0;
    }
</style>
