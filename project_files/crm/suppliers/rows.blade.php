@php
  $send_week = [
    1 => __('message.weekly'),
    2 => __('message.once_in_two_weeks'),
    3 => __('message.once_every_three_weeks'),
    4 => __('message.once_every_four_weeks')
  ];
@endphp
@foreach($suppliers as $key => $item)
  <div class="supplier-block">
    <div class="supplier-row pointer supplier-data-row" data-id="{{$item->id}}" data-edit="{{ route('suppliers.view', ['id' => $item->id]) }}">
      <div class="supplier-col supplier-name">
        {{--
        <span class="up-down">
          <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="info-arrow">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z" fill="#3D445C"/>
          </svg>
        </span>
        --}}
        <div>
          {{$item->name}}
          <span class="second-line">
            {{$item->firm->descr}}
          </span>
        </div>
      </div>
      <div class="supplier-col">
        {{$item->fio}}
        <span class="second-line">
          {{$item->phone}}
        </span>
      </div>
      <div class="supplier-col">
        @php
          $list = explode(", ", $item->cities);
        @endphp
        @if(count($list) <= 1)
          {{$item->cities}}
        @else
          {{ $list[0] }}
          @php
            unset($list[0]);
          @endphp
          <span class="city-counts al-power-tip" title="{{ implode(', ', $list) }}">{{ count($list) }}</span>
        @endif
      </div>
      <div class="supplier-col">{{$item->email}}</div>
      <div class="supplier-col">
        {{$item->firm->comment}}
      </div>
      <div class="supplier-col">
        {{$item->status ? $item->status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : '-'}}
      </div>
      <div class="supplier-col action-col">
        @if(!in_array(Auth::user()->role_id, [2,5]))
        <span class="edit pointer up-down-new">
          <svg fill="#FC6B40" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727" xml:space="preserve"  class="info-arrow">
            <g class="info-arrow">
              <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"  class="info-arrow"/>
            </g>
          </svg>
        </span>
        @endif
        <a href="{{ route('suppliers.view', ['id' => $item->id]) }}" class="edit">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="supplier-row-selects hide" data-supplier_id="{{ $item->id }}">
      <div class="supplier-info">
        <div class="supplier-info-item">
          <div class="name">@lang('message.link_to_file')</div>
          <div class="value"><a href="{{$item->firm->link}}" download>{{$item->firm->link}}</a></div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.next_send')</div>
          <div class="value">{{ $item->firm->next_date ? date('d.m.Y',strtotime($item->firm->next_date)) : '' }}</div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.send_days')</div>
          <div class="value">{{@implode(',', json_decode($item->firm->send_days))}}</div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.last_update')</div>
          <div class="value">{{ $item->last_update ? date('d.m.Y H:i:s',strtotime($item->last_update)) : '' }}</div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.send_frequency')</div>
          <div class="value">{{ $send_week[$item->firm->send_week] }}</div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.updated2')</div>
          <div class="value">{{ $item->cron ? 'крон' : 'менеджер' }}</div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.last_send')</div>
          <div class="value">{{ $item->firm->last_send ? date('d.m.Y',strtotime($item->firm->last_send)) : '' }}</div>
        </div>
        <div class="supplier-info-item">
          <div class="name">@lang('message.hide_price')</div>
          <div class="value">{{ $item->firm->hidden_price ? 'да' : 'нет' }}</div>
        </div>

        <form method="POST" action="/manager/suppliers/{{ $item->id }}/update-status" class="status-update-form">
          @csrf
          <input type="hidden" name="old_status_id" value="{{ $item->status->id }}" />

          <div class="field-container">
            <div class="input-block">
              <label>@lang('message.status')</label>
              <select class="w540 al-dropdown details-select" name="new_status_id" required>
                <option value="">-</option>
                @foreach($item->availableStatuses() as $statusId => $statusName)
                  <option value="{{ $statusId }}" @if($statusId == $item->status->id) selected @endif>{{ $statusName }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="field-container comment-container" @if($item->status_id == 7) style="display: none" @endif>
            <div class="input-block">
              <label>@lang('message.comment1')</label>
              <textarea name="comment2" required></textarea>
            </div>
          </div>

          <div class="field-container right">
            <div class="buttons-block">
              <a href="" class="cancel">@lang('message.cancel')</a>
              <button class="submit">@lang('message.save')</button>
            </div>
          </div>
        </form>


      </div> 
      <div class="right-block">
        <a href="{{ route('suppliers.download-grid', ['id' => $item->id]) }}" download>
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.125 12.5V15.8333C3.125 16.1096 3.23475 16.3746 3.4301 16.5699C3.62545 16.7653 3.8904 16.875 4.16667 16.875H15.8333C16.1096 16.875 16.3746 16.7653 16.5699 16.5699C16.7653 16.3746 16.875 16.1096 16.875 15.8333V12.5H18.125V15.8333C18.125 16.4411 17.8836 17.024 17.4538 17.4538C17.024 17.8836 16.4411 18.125 15.8333 18.125H4.16667C3.55888 18.125 2.97598 17.8836 2.54621 17.4538C2.11644 17.024 1.875 16.4411 1.875 15.8333V12.5H3.125Z" fill="#FC6B40"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.39062 8.77527L6.27451 7.89139L9.99923 11.6161L13.724 7.89139L14.6078 8.77527L9.99923 13.3839L5.39062 8.77527Z" fill="#FC6B40"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.625 2.5V12.5H9.375V2.5H10.625Z" fill="#FC6B40"/>
          </svg>
          @lang('message.download_last_files')
        </a>
      </div>
      <div>
        <b>@lang('message.prices')</b>
        <table>
          <tr>
            <td>@lang('message.type')</td>
            <td>@lang('message.boards_table_cost')</td>
            <td>@lang('message.pasting_service_cost')</td>
            <td></td>
            <td>@lang('message.discount')</td>
            <td class="input-block">
              {{$item->discount}}
            </td>
            <td>@lang('message.use_price_from_grid')</td>
            <td class="input-block">
              {{$item->usePrice ? 'да' : 'нет'}}
            </td>
          </tr>
          @php
            $i = 0;
          @endphp
          @foreach($item->types as $type => $title)
            <tr>
              <td>{{$title}}</td>
              <td>
                {{$item->priceData[$item->firm->id][$type]}}
              </td>
              <td>
                {{$item->serviceData[$item->firm->id][$type]}}
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endforeach