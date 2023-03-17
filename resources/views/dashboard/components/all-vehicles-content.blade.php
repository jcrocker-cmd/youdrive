
<section class="all-vehicles-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="">All Registered Vehicles</h5>
    <a href="/add" title="Add Car"><button class="btn btn-success rounded-pill"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
    </div>

<div class="table-responsive px-3 pb-3" style="font-size: 14px;">

<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="font-size: 14px; width: 100%;">
<thead class="table table-dark" style="font-size: 14px;">
<tr>
  <th scope="col">Car</th>
  <th scope="col" class="">Owner</th>
  <th scope="col">Plate No.</th>
  <th scope="col">Vehicle Status</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($addcar as $item)
@if($item->is_active)
 <tr>

  <td>
    <div class ="d-flex align-items-center">
        <img src="/images/uploads/{{ $item->carphoto }}" alt=""
        style="width: 45px;" class="">
      <div class="ms-3">
          <p class="fw-bold mb-1">{{ $item->brand }} {{ $item->model }} {{ $item->year }}</p>
          <p class="text-muted mb-0">{{ $item->transmission }}</p>

      </div>
    </div>
  </td>

  <td>

    <div class="">
        <p class="fw-bold mb-1">{{ $item->fname}} {{ $item->lname}}</p>
        <p class="text-muted mb-0">{{ $item->email}}</p>
    </div>

  </td>
  

  <td>{{ $item->plate}}</td>

  <td>
    @if ($item->status == 'Available')
      <span class="badge bg-success rounded-pill">{{ $item->status }}</span>
    @elseif ($item->status == 'Rented')
      <span class="badge bg-danger rounded-pill">{{ $item->status }}</span>
    @else
      <span class="badge bg-warning rounded-pill">{{ $item->status }}</span>
    @endif

  </td>

  <td>
  <a href="/viewcar/{{ $item->id }}" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  <a href="/editcar/{{ $item->id }}" title="Edit" class="actions action-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  <a href="/delete_car/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

  </td>
  </tr>
  @endif
  @endforeach


</tbody>
</table>





</div>




</section>