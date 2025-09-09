@extends('app')
@section('title', 'Dashboard')
@section('content')
<section class="dashboard">
  <div class="row">
      <div class="col-sm-12">
        <div class="row">
            <!-- Total Buku -->
              <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Total Buku <span>| Semua</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $totalBook ?? 0 }}</h6>
                        <span class="text-success small pt-1 fw-bold">{{ $totalStock ?? 0 }}</span> <span class="text-muted small pt-2 ps-1">Stok Buku</span>
  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End Total Buku -->

            <!-- buku yang di pinjam -->
              <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Buku Yang Di Pinjam</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $diPinjam ?? 0 }}</h6>
                        <span class="text-success small pt-1 fw-bold">{{ $totalStock - $diPinjam }}</span> <span class="text-muted small pt-2 ps-1">Stok Buku</span>
  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End buku yang di pinjam -->

            <!-- buku yang dikembalikan-->
              <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Buku Yang Sudah Di Kembalikan</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $returnBooks ?? 0 }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End buku yang dikembalikan-->

            <!-- buku yang belum dikembalikan-->
              <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title">Buku Yang Belum Di Kembalikan</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $notReturnBooks ?? 0 }}</h6>
                        <span class="text-success small pt-1 fw-bold">{{ $totalStock - $diPinjam }}</span> <span class="text-muted small pt-2 ps-1">Stok Buku</span>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End buku yang belum dikembalikan-->
        </div>
        <div class="mt-3">
          <table class="table table-bordered text-center">
            <h2 class="card-title ms-2">Total Denda</h2>
            <thead>
              <tr>
                <th>No Transaksi</th>
                <th>Nama Anggota</th>
                <th>Denda</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($fines as $fine )
              <tr>
                <td>{{ $fine->trans_number }}</td>
                <td>{{ $fine->member->nama_anggota }}</td>
                <td>{{ number_format($fine->fine) }}</td>
              </tr>
              @endforeach
              <tr>
                <th colspan="2" class="text-end">Total Denda</th>
                <th>{{ number_format($totalFine) ?? 0 }}</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</section>
@endsection