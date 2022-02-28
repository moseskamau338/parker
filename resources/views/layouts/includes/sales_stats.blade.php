 @php
    $data = (object)[
        'paid'=>(object)[
            'count'=>0,
            'sum'=>0,
        ],
        'pending'=>(object)[
            'count'=>0,
            'sum'=>0,
        ],
        'lost'=>(object)[
            'count'=>0,
            'sum'=>0,
        ],
    ];

    foreach (['PAID','LOSS','PENDING'] as $status) {
        $q = $rows->where('status', $status);

        if ($q->count() > 0 && $status === 'PAID'){
            $data->paid->count = $q->count();
            $data->paid->sum = $q->sum('totals');
        }

        if ($q->count() > 0 && $status === 'PENDING'){
            $data->pending->count = $q->count();
            $total_sum = 0;
            foreach ($q->get() as $pending){
                $total_sum += $pending->getParkingFee(\Carbon\Carbon::now('Africa/Nairobi'))->fee;
            }
            $data->pending->sum = $total_sum;
        }

        if ($q->count() > 0 && $status === 'LOSS'){
            $data->lost->count = $q->count();
            $data->lost->sum = $q->sum('totals');
        }
    }
@endphp

<div class="mb-4">
      <dl class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Total Paid Sales
          </dt>
          <dd class="mt-1 text-2xl font-semibold text-emerald-600">
            KES {{number_format($data->paid->sum,2)}}
          </dd>
            <dd class="mt-1 text-sm font-semibold text-gray-500">
            Total of: {{$data->paid->count}} records
          </dd>
        </div>

        <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Total Pending Sales
          </dt>
          <dd class="mt-1 text-2xl font-semibold text-amber-600">
            KES {{number_format($data->pending->sum,2)}}
          </dd>
            <dd class="mt-1 text-sm font-semibold text-gray-500">
            Total of: {{$data->pending->count}} records
          </dd>
        </div>

        <div class="px-4 py-2 bg-white shadow rounded-lg overflow-hidden sm:p-6 h-[max-content]">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Total Lost Sales
          </dt>
          <dd class="mt-1 text-2xl font-semibold text-red-600">
            KES {{number_format($data->lost->sum,2)}}
          </dd>
            <dd class="mt-1 text-sm font-semibold text-gray-500">
            Total of: {{$data->lost->count}} records
          </dd>
        </div>
      </dl>
    </div>
