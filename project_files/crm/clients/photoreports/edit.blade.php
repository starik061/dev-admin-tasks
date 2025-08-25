<div class="photoreports-popup">
	<div class="photoreports-add-header">
    <span>Фотоотчет</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
      </svg>
    </span>
  </div>
	<div class="photoreports-info">
		<div class="leads-thead">
      <div class="leads-col" >
        Клиент
      </div>
      <div class="leads-col" >
        Приложение
      </div>
      <div class="leads-col" >
        Договор
      </div>
      <div class="leads-col" >
        Код плоскости
      </div>
      <div class="leads-col">
        Город
      </div>
      <div class="leads-col">
        Адрес
      </div>
      <div class="leads-col">
        Период аренды
      </div>
    </div>
    <div class="leads-tbody">
    	<div class="leads-row">
    		<div class="leads-col" >
          {{$report->client_name}}
        </div>
        <div class="leads-col" >
          Приложение №{{$report->act_number}}
        </div>
        <div class="leads-col" >
          Договор №{{$report->contract_number}}
        </div>
        <div class="leads-col" >
          {{$report->code}}
        </div>
        <div class="leads-col">
          {{$report->city_name}}
        </div>
        <div class="leads-col">
          {{$report->addr}}
        </div>
        <div class="leads-col">
          &nbsp;&nbsp;c {{$report->date_from}} по {{$report->date_to}}
        </div>
    	</div>
    </div>
	</div>
	<form 
		@if($report->report_id)
			action="/manager/photoreports/{{ $report->contract_board_id }}/report/{{$report->report_id}}/update"
		@else
			action="/manager/photoreports/{{ $report->contract_board_id }}/date/{{$date_}}"
		@endif
			method="POST" enctype="multipart/form-data" class="photoreports-form" id="photoreports-form">
		<div class="field-container">
			<div class="input-block">
				<label>Сюжет</label>
				<input type="text" name="subject" value="{{$report->subject}}">
			</div>
			<div class="input-block">
				<label>Макет</label>
				<input type="file" name="photo_design"/>
			</div>
			<div class="input-block">
				<label>Тип работ</label>
				<select name="work_id" class="work_id">
					@foreach($work as $key => $value)
					<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="field-container">
			<div class="input-block">
				<label>Фотоотчет ближний</label>
				<input type="file" name="photo_near"/>
			</div>
			<div class="input-block">
				<label>Фотоотчет дальний</label>
				<input type="file" name="photo_far"/>
			</div>
			<div class="input-block">
				<label>Фотоотчет ночной</label>
				<input type="file" name="photo_night"/>
			</div>
		</div>
		<div class="align-right">
      <button class="clear-new">Отмена</button>
      <button class="submit">Добавить</button>
    </div>
	</form>
</div>