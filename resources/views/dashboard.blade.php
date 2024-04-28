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
{{-- <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h2 class="card-title mb-0">Product Analysis</h2>
          <div class="wrapper d-flex">
            <div class="d-flex align-items-center mr-3">
              <span class="dot-indicator bg-success"></span>
              <p class="mb-0 ml-2 text-muted">Product</p>
            </div>
            <div class="d-flex align-items-center">
              <span class="dot-indicator bg-primary"></span>
              <p class="mb-0 ml-2 text-muted">Resources</p>
            </div>
          </div>
        </div>
        <div class="chart-container">
          <canvas id="dashboard-area-chart" height="80"></canvas>
        </div>
      </div>
    </div>
  </div>
</div> --}}
{{-- <div class="row">
  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Todo</h4>
        <div class="add-items d-flex">
          <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
          <button class="add btn btn-primary font-weight-medium todo-list-add-btn">Add</button>
        </div>
        <div class="list-wrapper">
          <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
            <li class="completed">
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked> Call John </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li>
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> Create invoice </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li>
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox"> Print Statements </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
            <li class="completed">
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
              </div>
              <i class="remove mdi mdi-close-circle-outline"></i>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Schedules</h4>
        <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
          <h3>27 Sep 2018</h3>
          <small>21 Events</small>
        </div>
        <div class="event border-bottom py-3">
          <p class="mb-2 font-weight-medium">Skype call with alex</p>
          <div class="d-flex align-items-center">
            <div class="badge badge-success">3:45 AM</div>
            <small class="text-muted ml-2">London, UK</small>
            <div class="image-grouped ml-auto">
              <img src="{{ url('assets/images/faces/face10.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face13.jpg') }}" alt="profile image"> </div>
          </div>
        </div>
        <div class="event py-3 border-bottom">
          <p class="mb-2 font-weight-medium">Data Analysing with team</p>
          <div class="d-flex align-items-center">
            <div class="badge badge-warning">12.30 AM</div>
            <small class="text-muted ml-2">San Francisco, CA</small>
            <div class="image-grouped ml-auto">
              <img src="{{ url('assets/images/faces/face20.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face17.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image"> </div>
          </div>
        </div>
        <div class="event py-3">
          <p class="mb-2 font-weight-medium">Meeting with client</p>
          <div class="d-flex align-items-center">
            <div class="badge badge-danger">4.15 AM</div>
            <small class="text-muted ml-2">San Diego, CA</small>
            <div class="image-grouped ml-auto">
              <img src="{{ url('assets/images/faces/face21.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face16.jpg') }}" alt="profile image"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4 grid-margin stretch-card">
    <div class="row flex-grow">
      <div class="col-md-6 col-xl-12 grid-margin grid-margin-md-0 grid-margin-xl stretch-card">
        <div class="card card-revenue">
          <div class="card-body d-flex align-items-center">
            <div class="d-flex flex-grow">
              <div class="mr-auto">
                <p class="highlight-text mb-0 text-white"> $168.90 </p>
                <p class="text-white"> This Month </p>
                <div class="badge badge-pill"> 18% </div>
              </div>
              <div class="ml-auto align-self-end">
                <div id="revenue-chart" sparkType="bar" sparkBarColor="#e6ecf5" barWidth="2"> 4,3,10,9,4,3,8,6,7,8 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-12 stretch-card">
        <div class="card card-revenue-table">
          <div class="card-body">
            <div class="revenue-item d-flex">
              <div class="revenue-desc">
                <h6>Member Profit</h6>
                <p class="font-weight-light"> Average Weekly Profit </p>
              </div>
              <div class="revenue-amount">
                <p class="text-primary"> +168.900 </p>
              </div>
            </div>
            <div class="revenue-item d-flex">
              <div class="revenue-desc">
                <h6>Total Profit</h6>
                <p class="font-weight-light"> Weekly Customer Orders </p>
              </div>
              <div class="revenue-amount">
                <p class="text-primary"> +6890.00 </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
{{-- <div class="row">
  <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-5 d-flex align-items-center">
            <canvas id="UsersDoughnutChart" class="400x160 mb-4 mb-md-0" height="200"></canvas>
          </div>
          <div class="col-md-7">
            <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Active Users</h4>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <p class="mb-0 font-weight-medium">67,550</p>
                  <small class="text-muted ml-2">Email account</small>
                </div>
                <p class="mb-0 font-weight-medium">80%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <p class="mb-0 font-weight-medium">21,435</p>
                  <small class="text-muted ml-2">Requests</small>
                </div>
                <p class="mb-0 font-weight-medium">34%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-7">
            <h4 class="card-title font-weight-medium mb-3">Amount Due</h4>
            <h1 class="font-weight-medium mb-0">$5998</h1>
            <p class="text-muted">Milestone Completed</p>
            <p class="mb-0">Payment for next week</p>
          </div>
          <div class="col-md-5 d-flex align-items-end mt-4 mt-md-0">
            <canvas id="conversionBarChart" height="150"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-5">
        <div class="d-flex flex-row justify-content-center align-items">
          <i class="mdi mdi-facebook text-facebook icon-lg"></i>
          <div class="ml-3">
            <h6 class="text-facebook font-weight-semibold mb-0">2.62 Subscribers</h6>
            <p class="text-muted card-text">You main list growing</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-5">
        <div class="d-flex flex-row justify-content-center align-items">
          <i class="mdi mdi-google-plus text-google icon-lg"></i>
          <div class="ml-3">
            <h6 class="text-google font-weight-semibold mb-0">3.4k Followers</h6>
            <p class="text-muted card-text">You main list growing</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-5">
        <div class="d-flex flex-row justify-content-center align-items">
          <i class="mdi mdi-twitter text-twitter icon-lg"></i>
          <div class="ml-3">
            <h6 class="text-twitter font-weight-semibold mb-0">3k followers</h6>
            <p class="text-muted card-text">You main list growing</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
<br> 
<div class="row">
  <div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        @foreach ($transactionsParCategorie as $categorie => $transactions)
            <h2>{{ $categorie }}</h2>
            @foreach ($transactions->groupBy('numero_compte') as $numeroCompte => $transactionsParNumeroCompte)
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Numero compte</th>
                                        <th class="cell">Intitulé</th>
                                        <th class="cell">Crédits alloués</th>
                                        <th class="cell">N°</th>
                                        <th class="cell">Intitulé dépense mandaté</th>
                                        <th class="cell">Montant</th>
                                        <th class="cell">Payes</th>
                                        <th class="cell">Solde disponible</th>
                                        <th class="cell">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $firstTransaction = $transactionsParNumeroCompte->first(); @endphp
                                    <tr>
                                        <td rowspan="{{ $transactionsParNumeroCompte->count() }}" class="cell">{{ $firstTransaction->numero_compte }}</td>
                                        <td rowspan="{{ $transactionsParNumeroCompte->count() }}" class="cell">{{ $firstTransaction->intitules }}</td>
                                        <td rowspan="{{ $transactionsParNumeroCompte->count() }}" class="cell">{{ $firstTransaction->credits_alloues }} FCFA</td>
                                        @foreach ($transactionsParNumeroCompte as $transaction)
                                            <td class="cell">{{ $transaction->numero_bon }}</td>
                                            <td class="cell">{{ $transaction->intitule }}</td>
                                            <td class="cell">{{ $transaction->montant }} FCFA</td>
                                            <td class="cell">{{ $transaction->payes }}</td>
                                            <td class="cell">
                                                <?php
                                                $creditAlloue = $transaction->credits_alloues;
                                                $montantTotalTransactionsPrecedentes = $transactionsParNumeroCompte->where('id', '<=', $transaction->id)->sum('montant');
                                                $soldeDisponible = $creditAlloue - $montantTotalTransactionsPrecedentes;
                                                ?>
                                                {{ $soldeDisponible }} FCFA
                                            </td>
                                            <td class="cell">{{ $transaction->date }}</td>
                                        </tr>
                                        @if (!$loop->last)
                                            <tr>
                                        @endif
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            @endforeach
        @endforeach
        <nav class="app-pagination">
            {{ $transactions->links() }}
        </nav><!--//app-pagination-->
    </div><!--//tab-pane-->
    
    
</div><!--//tab-content-->

</div>



<div class="content-wrapper">

  <section class="content">
  <div class="container-fluid">
  
  <div class="row">
  
  <section class="col-lg-7 connectedSortable">
  <div class="card" style="width: 170%;">
      <div class="card-header">
          <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              DEPENSES
          </h3>
      </div>
      <div class="card-body" >
        <div id="chartContainer" style="height: 370px;"></div>
      </div>
    
      <!-- /.card-body -->
  </div>

  
  @php
  $link = mysqli_connect("localhost", "root", "");
  mysqli_select_db($link, "pfc");
  
  $test = array();
  $count = 0; 
  $res = mysqli_query($link, "SELECT * FROM transactions");
  while($row = mysqli_fetch_array($res)) {
      $test[$count]["label"] = $row["credits_alloues"];
      $test[$count]["y"] = $row["montant"];
      $count = $count + 1;
  }
  @endphp

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <script>
      window.onload = function() {
  
          var chart = new CanvasJS.Chart("chartContainer", {
              animationEnabled: true,
              exportEnabled: true,
              theme: "light1", // "light1", "light2", "dark1", "dark2"
              title: {
                  text: "DEPENSES"
              },
              axisY: {
                  includeZero: true
              },
              data: [{
                  type: "area", //change type to bar, line, area, pie, etc
                  dataPoints:<?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
              }]
          });
          chart.render();
  
      }
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