 @php
    $data = (object)[
        'vehicle_count'=>$rows->count(),
        'avg_time'=>0,
    ];
    foreach($rows as $record){
       $data-> avg_time += \Carbon\Carbon::parse($record->created_at)->diffInMinutes(\Carbon\Carbon::parse($record->leave_time));
    }
    $data->avg_time /= $data->vehicle_count
@endphp

<div class="mb-4">
      <dl class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Total Vehicle Count
          </dt>
          <dd class="mt-1 text-2xl font-semibold">
              <span class="text-emerald-600">
                {{number_format($data->vehicle_count)}}
              </span> <small class="text-gray-400">Vehicles</small>
          </dd>
        </div>

        <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Avg. Duration
          </dt>
          <dd class="mt-1 text-2xl font-semibold text-amber-600">
              <span class="text-emerald-600">
                {{number_format($data->avg_time)}}
              </span> <small class="text-gray-400">mins</small>
          </dd>
        </div>

      </dl>
    </div>
