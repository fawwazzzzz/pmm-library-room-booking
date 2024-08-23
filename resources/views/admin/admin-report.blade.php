@extends('admin.admin')
@section('content')
    
    <div class="w-100 d-flex justify-content-between">
        <span class="head-rekod">Laporan Bulanan</span>
        <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
    </div>

    <div class="row">
        @foreach ($month as $i)
            <div class="col-md-6">
                <a href="laporan-bulanan/{{ $i['monthID'] }}" class="month-card">
                    <div class="card info-card revenue-card mt-4">
                        <div class="card-body px-5">
                            <div class="d-flex align-items-center justify-content-between flex-row month-title">
                                @switch($i['monthID'])
                                    @case(1)
                                        <h5 class="card-title">Januari</h5>
                                        @break
                                
                                    @case(2)
                                        <h5 class="card-title">Februari</h5>
                                        @break

                                    @case(3)
                                        <h5 class="card-title">Mac</h5>
                                        @break
                                
                                    @case(4)
                                        <h5 class="card-title">April</h5>
                                        @break

                                    @case(5)
                                        <h5 class="card-title">Mei</h5>
                                        @break

                                    @case(6)
                                        <h5 class="card-title">Jun</h5>
                                        @break

                                    @case(7)
                                        <h5 class="card-title">Julai</h5>
                                        @break

                                    @case(8)
                                        <h5 class="card-title">Ogos</h5>
                                        @break

                                    @case(9)
                                        <h5 class="card-title">September</h5>
                                        @break

                                    @case(10)
                                        <h5 class="card-title">Oktober</h5>
                                        @break

                                    @case(11)
                                        <h5 class="card-title">November</h5>
                                        @break

                                    @case(12)
                                        <h5 class="card-title">Disember</h5>
                                        @break
                                    
                                @endswitch
                                <i class="bi bi-chevron-right monthly-icon"></i>
                            </div>
                        </div>
                        <canvas id="myChart{{ $i['monthID'] }}" width="700" height="200"></canvas>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    
@endsection

@push('scripts')
    <script>

    const month = {{ Illuminate\Support\Js::from($month) }};    

        month.forEach(i => {
            const ctx = document.querySelector(`#myChart${i.monthID}`).getContext('2d');
    
            // Create a gradient background color from left to right
            const gradient = ctx.createLinearGradient(0, 0, ctx.canvas.width, 0);
            gradient.addColorStop(0, 'rgba(255, 99, 132, 0.2)'); // Start color (left)
            gradient.addColorStop(1, 'rgba(54, 162, 235, 0.2)'); // End color (right)
    
            new Chart(ctx, {
                type: 'line',
                data: {
                labels: ['2024-8-8', '2024-8-9', '2024-8-10', '2024-8-11', '2024-8-12', '2024-8-13', '2024-8-14'],
                datasets: [{
                    label: 'Test',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: gradient, // Replace with a single color for the background
                    borderColor: 'rgba(255, 99, 132, 1)', // Replace with a single color for the border
                    borderWidth: 1,
                    fill: true, // Enable filling
                    tension: 0.4, // Adjust tension for the curve (0-1)
                    pointRadius: 0, // Hide data points
                }]
                },
                options: {
                    // layout: {
                    //     padding: 20
                    // },
                    scales: {
                        x: {
                            display: false,
                            ticks: {
                                font: {
                                    size: 10 // Font size for x-axis labels
                                }
                            }
                        },
                        y: {
                            display: false,
                            ticks: {
                                font: {
                                    size: 10 // Font size for y-axis labels
                                }
                            }
                        }
                    },
                plugins: {
                    datalabels: {
                        display: false, // Disable data labels
                        font: {
                            size: 5 // Adjust data label font size
                        }
                    },
                    legend: {
                    display: false, // Hide the legend
                    },
                    tooltip: {
                        display: false,
                    },
                }
                }
            });
        });

        // TEST Looping

        // for (let index = 0; index < array.length; index++) {
        //     const element = array[index];
            
        // }
        // const ctx = document.querySelector('#myChart').getContext('2d');

        // // Create a gradient background color from left to right
        // const gradient = ctx.createLinearGradient(0, 0, ctx.canvas.width, 0);
        // gradient.addColorStop(0, 'rgba(255, 99, 132, 0.2)'); // Start color (left)
        // gradient.addColorStop(1, 'rgba(54, 162, 235, 0.2)'); // End color (right)

        // new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //     labels: ['2024-8-8', '2024-8-9', '2024-8-10', '2024-8-11', '2024-8-12', '2024-8-13', '2024-8-14'],
        //     datasets: [{
        //         label: 'Test',
        //         data: [65, 59, 80, 81, 56, 55, 40],
        //         backgroundColor: gradient, // Replace with a single color for the background
        //         borderColor: 'rgba(255, 99, 132, 1)', // Replace with a single color for the border
        //         borderWidth: 1,
        //         fill: true, // Enable filling
        //         tension: 0.4, // Adjust tension for the curve (0-1)
        //         pointRadius: 0, // Hide data points
        //     }]
        //     },
        //     options: {
        //         // layout: {
        //         //     padding: 20
        //         // },
        //         scales: {
        //             x: {
        //                 display: false,
        //                 ticks: {
        //                     font: {
        //                         size: 10 // Font size for x-axis labels
        //                     }
        //                 }
        //             },
        //             y: {
        //                 display: false,
        //                 ticks: {
        //                     font: {
        //                         size: 10 // Font size for y-axis labels
        //                     }
        //                 }
        //             }
        //         },
        //     plugins: {
        //         datalabels: {
        //             display: false, // Disable data labels
        //             font: {
        //                 size: 5 // Adjust data label font size
        //             }
        //         },
        //         legend: {
        //         display: false, // Hide the legend
        //         },
        //         tooltip: {
        //             display: false,
        //         },
        //     }
        //     }
        // });
    </script>
@endpush