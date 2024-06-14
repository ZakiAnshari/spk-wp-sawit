<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="align-items-center text-center text-nowrap">No.</th>
        <th class="align-items-center text-center text-nowrap">Tanggal</th>
        <th class="align-items-center text-center text-nowrap">Gaji</th>
        <th class="align-items-center text-center text-nowrap">Kasbon</th>
        <th class="align-items-center text-center text-nowrap">THR</th>
        <th class="align-items-center text-center text-nowrap">Final Price</th>
        <th class="align-items-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <form action="{{ route('gaji.store') }}" method="POST">
        @csrf
        <tr>
          <input type="hidden" class="form-control" name="user_id" value="{{ $karyawan->id }}">
          <td class="align-items-center text-center text-nowrap"></td>
          <td class="align-items-center text-center text-nowrap p-1"><input type="date" class="form-control" id="tanggalInput" name="tanggal"></td>
          <td class="align-items-center text-center text-nowrap p-1"><input type="text" class="form-control" id="gajiInput" name="gaji"></td>
          <td class="align-items-center text-center text-nowrap p-1"><input type="text" class="form-control" id="kasbonInput" name="kasbon"></td>
          <td class="align-items-center text-center text-nowrap p-1"><input type="text" class="form-control" id="thrInput" name="thr"></td>
          <td class="align-items-center text-center text-nowrap p-1"><input readonly type="text" class="form-control" id="finalPriceInput" name="final_price"></td>
          <td class="align-items-center text-nowrap">
            <button type="submit" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></button>
          </td>
        </tr>
      </form>
      @foreach($gajis as $gaji)
        <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
          @csrf
          @method('PUT')
          <tr>
            <input type="hidden" class="form-control" name="user_id" value="{{ $karyawan->id }}">
            <td class="align-items-center text-center text-nowrap">{{ $gajis->firstItem() + $loop->index }}</td>
            <td class="align-items-center text-center text-nowrap p-1"><input type="date" class="form-control" id="tanggalInput" name="tanggal" value="{{ $gaji->tanggal }}"></td>
            <td class="align-items-center text-center text-nowrap p-1"><input type="text" class="form-control" id="gajiInput" name="gaji" value="{{ $gaji->gaji }}"></td>
            <td class="align-items-center text-center text-nowrap p-1"><input type="text" class="form-control" id="kasbonInput" name="kasbon" value="{{ $gaji->kasbon }}"></td>
            <td class="align-items-center text-center text-nowrap p-1"><input type="text" class="form-control" id="thrInput" name="thr" value="{{ $gaji->thr }}"></td>
            <td class="align-items-center text-center text-nowrap p-1"><input readonly type="text" class="form-control" id="finalPriceInput" name="final_price" value="{{ $gaji->final_price }}"></td>
            <td class="align-items-center text-nowrap">
              @if(auth()->user()->hasPermission('role-edit'))
                <button type="submit" class="btn btn-icon btn-primary"><i class="fas fa-check"></i></button>
              @endif
              @if(auth()->user()->hasPermission('role-delete'))
                <a href="{{ route('gaji.destroy', $gaji->id) }}" class="btn btn-icon btn-danger delete2"><i class="fas fa-trash"></i></a>
              @endif
            </td>
          </tr>
        </form>
      @endforeach
      <tr>
        <td class="align-items-center text-nowrap"></td>
        <td class="align-items-center text-nowrap"></td>
        <td class="align-items-center text-nowrap"></td>
        <td class="align-items-center text-nowrap"></td>
        <td class="align-items-center text-nowrap"></td>
        <td class="align-items-center text-center text-nowrap p-1"><input readonly type="text" class="form-control" name="" id="total"></td>
        <td class="align-items-center text-nowrap"></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="float-right">
  {{ $gajis->links('pagination::bootstrap-4') }}
</div>
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const gajiInputs = document.querySelectorAll('.form-control[name="gaji"]');
    const kasbonInputs = document.querySelectorAll('.form-control[name="kasbon"]');
    const thrInputs = document.querySelectorAll('.form-control[name="thr"]');
    const finalPriceInputs = document.querySelectorAll('.form-control[name="final_price"]');
    const totalInput = document.getElementById('total');

    const formatter = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR'
    });

    function formatCurrencyAndFinalPrice(input) {
      input.value = formatter.format(input.value.replace(/[^\d]/g, '')).replace(',00', '');
      updateFinalPrice(input);
    }

    function updateFinalPrice(input) {
      const parentRow = input.closest('tr');
      const gaji = parseFloat(parentRow.querySelector('.form-control[name="gaji"]').value.replace(/[^\d]/g, '')) || 0;
      const kasbon = parseFloat(parentRow.querySelector('.form-control[name="kasbon"]').value.replace(/[^\d]/g, '')) || 0;
      const thr = parseFloat(parentRow.querySelector('.form-control[name="thr"]').value.replace(/[^\d]/g, '')) || 0;
      
      const finalPriceBeforeKasbon = gaji + thr;
      const finalPrice = finalPriceBeforeKasbon - kasbon;

      parentRow.querySelector('.form-control[name="final_price"]').value = formatter.format(finalPrice).replace(',00', '');
      updateTotal();
    }

    function updateTotal() {
      let total = 0;
      finalPriceInputs.forEach(input => {
        total += parseFloat(input.value.replace(/[^\d]/g, '') || 0);
      });
      totalInput.value = formatter.format(total).replace(',00', '');
    }

    gajiInputs.forEach(formatCurrencyAndFinalPrice);
    kasbonInputs.forEach(formatCurrencyAndFinalPrice);
    thrInputs.forEach(formatCurrencyAndFinalPrice);
    finalPriceInputs.forEach(formatCurrencyAndFinalPrice);

    gajiInputs.forEach(input => {
      input.addEventListener('input', function() { formatCurrencyAndFinalPrice(this); });
    });
    kasbonInputs.forEach(input => {
      input.addEventListener('input', function() { formatCurrencyAndFinalPrice(this); });
    });
    thrInputs.forEach(input => {
      input.addEventListener('input', function() { formatCurrencyAndFinalPrice(this); });
    });
  });
</script>
@endpush