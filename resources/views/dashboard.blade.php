@extends('layout.template')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-wallet text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Budget</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$totalBudget}} FCFA</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-currency-usd text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Depenses</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$totalDepense}} FCFA</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-scale-balance text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Solde</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$soldeRestant}} FCFA</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-chart-line text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Categorie de depenses</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$totalCategorie}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>





<h1 style="text-align: center; color:rgb(11, 197, 95)">
  <i class="menu-icon fa-solid fa-hand-holding-dollar"></i>
            DEPENSES
</h1>
<canvas id="chart" width="50px" height="25px"></canvas>

  
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

{{-- <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script> --}}
  
    <script>
      var ctx = document.getElementById('chart').getContext('2d');
      var userChart = new Chart(ctx,{
          type:'bar',
          data:{
              labels: {!! json_encode($labels) !!},
              datasets: {!! json_encode($datasets) !!}
          },
      });
    </script>
    
  <script>
    function confirmDelete(url) {
        if (confirm("Voulez-vous vraiment supprimer ?")) {
            window.location.href = url;
        }
    }
  </script>



@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush