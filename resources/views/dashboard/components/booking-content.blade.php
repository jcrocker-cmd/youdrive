
<section class="all-inquiry-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="">All Bookings</h5>
    </div>

<div class="table-responsive px-3 pb-3" style="font-size: 14px;">

<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="font-size: 14px; width: 100%;">
<thead class="table table-dark" style="font-size: 14px;">
<tr>
  <th scope="col" class="col-3">Renter</th>
  <th scope="col">Rented Car</th>
  <th scope="col">Start</th>
  <th scope="col">Return</th>
  <th scope="col">Created At</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($booking->reverse() as $item)
 <tr>
  <td>
    <div class ="d-flex align-items-center">
        <img src="user.jpg" alt=""
        style="height: 45px; width: 45px;" class="rounded-circle">
    <div class="ms-3">
        <p class="fw-bold mb-1">{{ $item->name}}</p>
        <p class="text-muted mb-0">{{ $item->con_email}}</p>
    </div>
    </div>

  </td> 

  <td>{{ $item->car->brand }} {{ $item->car->model }}</td>
  <!-- <td>Toyota</td> -->
  
  <td>
    <div class="">
      <p class="fw-bold mb-1">{{ \Carbon\Carbon::parse($item->start_date)->format('F d, Y')}}</p>
      <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A')}}</p>
    </div>
  </td>

  <td>
    <div class="">
      <p class="fw-bold mb-1">{{ \Carbon\Carbon::parse($item->return_date)->format('F d, Y')}}</p>
      <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item->return_time)->format('h:i A')}}</p>
    </div>
  </td>

  <td>
  {{ \Carbon\Carbon::parse($item->created_at)->fromNow() }}
  </td>

  <td>
  <a href="#" title="View" class="actions action-view" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
  <a href="/delete_booking/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

  </td>
  </tr>
  @endforeach


</tbody>
</table>



<div class="bg-light db-chart px-3 py-3 mt-4" style=" border-radius: 10px; width: 100%; ">
  <h5><strong>Booking Report</strong></h5>
  <canvas width="800" height="400" id="booking_Chart"></canvas>
  <div>
  <button id="day-btn">Day</button>
  <button id="week-btn">Week</button>
  <button id="month-btn">Month</button>
</div>
</div>

</div>




</section>




<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;">
          <thead class="table" style="background: #023047; color: white;">
            <tr>
            <th style="padding: 10px; text-align: left; width: 50%;">Renter Information</th>
            <th style="padding: 10px; text-align: left; width: 50%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Full Name</td>
              <td style="padding: 10px;"><span id="name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Contact Email</td>
              <td style="padding: 10px;"><span id="con_email"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Contact Phone</td>
              <td style="padding: 10px;"><span id="con_num"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Address</td>
              <td style="padding: 10px;"><span id="address"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Message (Optional)</td>
              <td style="padding: 10px;"><span id="msg"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">License (Front Side)</td>
              <td style="padding: 10px;"><span id="view_front_license"><img src="" style="width: 200px;"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">License (Back Side)</td>
              <td style="padding: 10px;"><span id="view_back_license"><img src="" style="width: 200px;"></span></td>
            </tr>
          </tbody>

          <thead class="table"  style="background: #023047; 
                                            color: white;
                                            ">
            <tr>
              <th style="padding: 10px; text-align: left;" colspan="2">Car Details</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Brand</td>
              <td style="padding: 10px;"><span id="car-brand"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Model</td>
              <td style="padding: 10px;"><span id="car-model"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Vehicle type</td>
              <td style="padding: 10px;"><span id="car-vehicle"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Year Model</td>
              <td style="padding: 10px;"><span id="car-year"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Transmission</td>
              <td style="padding: 10px;"><span id="car-transmission"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Plate No.</td>
              <td style="padding: 10px;"><span id="car-plate"></span></td>
            </tr>
          </tbody>

          <thead class="table"  style="background: #023047; 
                                            color: white;
                                            ">
            <tr>
              <th style="padding: 10px; text-align: left;" colspan="2">Reservation Details</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Start Date</td>
              <td style="padding: 10px;"><span id="start_date"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Start Time</td>
              <td style="padding: 10px;"><span id="start_time"></span></td>
            </tr>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Return Date</td>
              <td style="padding: 10px;"><span id="return_date"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Return Time</td>
              <td style="padding: 10px;"><span id="return_time"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Mode of Delivery</td>
              <td style="padding: 10px;"><span id="mode_del"></span></td>
            </tr>
          </tbody>


          <thead class="table"  style="background: #023047; 
                                            color: white;
                                            ">
            <tr>
              <th style="padding: 10px; text-align: left;" colspan="2">Payment Details</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: 1px solid black;">
              <td style="padding: 10px;">Payment Method</td>
              <td style="padding: 10px;"><span id="payment"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Total Amount Payable</td>
              <td style="padding: 10px;">@fat</td>
            </tr>
          </tbody>
        </table>

        <span><strong>Created at:</strong> <span id="date"></span></span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>



