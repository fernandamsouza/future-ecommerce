<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    </x-slot>
    <x-slot name="js">
        <script src="{{ asset('js/admin/dashboard.js') }}" defer></script>
    </x-slot>
    <x-slot name="chart">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </x-slot>

        <div class="_container">
            <div class="headings flex_align">
                <div class="good">
                    <p>OVERVIEW</p>
                    <h3>Oi, {{ ucfirst(auth()->user()->first_name) }}</h3>
                    <p>Aqui está o que aconteceu no seu shop hoje.</p>
                </div>
                <button class="cta card flex_align">
                    <span class="material-icons">add</span>
                    <a style="text-decoration: none" href="{{ route('admin.products.create') }}"><p>Adicionar produto</p></a>
                </button>
            </div>

            <div class="data_grid">
                <div class="card flex_align">
                    <div class="chart">
                        <canvas id="btc"></canvas>
                    </div>
                    
                    <div class="chart_detail">
                        <h1 class="totalEarning"
                            data-totalBuyAmount="{{ $totalBuyAmount }}" 
                            data-totalPaid="{{ $totalPaid }}"
                            style="color: rgb(104, 142, 255)">
                            ${{ $totalPaid }}
                        </h1>
                        <p>Valor de pagamentos finalizados</p>
                    </div>
                </div>
                <div class="card flex_align">
                    <div class="chart">
                        <canvas id="dollar"></canvas>
                    </div>
    
                    <div class="chart_detail">
                        <h1 class="totalUser"
                            data-totalUser="{{ $totalUser }}" 
                            data-userHasOrder="{{ $userHasOrder }}">
                            {{ $totalUser }}
                        </h1>
                        <p>Total de pedidos</p>
                    </div>
                </div>
                <div class="card bar_graph">
                    <div class="product card">
                        <div class="productChart" data-names="{{ $category->implode('title', '-') }}" data-values="{{ $category->implode('products_count', '-') }}">
                            <canvas id="productCanvas"></canvas>
                        </div>
                    </div>
                </div>
    
                <div class="card notify">
                    <div style="margin: 1rem 0;" class="headings">
                        <h3>Últimos pedidos hoje</h3>
                        <p>{{ now()->format('d l') }}</p>
                    </div>
                    @forelse ($orders as $order)
                        <div>
                            <h1>${{ $order->grand_total }}</h1>
                            <p>Pedido-{{$order->postal_code}}</p>
                        </div>    
                    @empty
                        <h3 style="color: darkred">No orders today</h3>    
                    @endforelse
                   
                </div>
            </div>

        </div>
</x-admin-layout>