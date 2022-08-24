<x-app-layout title="Welcome">
    <div class="container text-center" >
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-5 fw-bold text-dark">
                    Selamat datang di <span class="text-primary">{{ config('app.name') }}</span>
                </h1>
            </div>
        </div>
                {{-- Anonymous component --}}
                <x-card title="ADS Digital Partner" teks=''>
                    ADS Digital Partner (PT Adma Digital Solusi)
                is an IT consulting company that was founded in 2019 based in Jakarta, Surabaya and
                Bandung. We focus on presenting IT-based solutions for a better Indonesia in the future.
                Our startup lines, Panenpanen.id and Bisnisomall.com are continuously advancing the
                digital supply chain in sub-urban and rural areas.
                </x-card>
    </div>
</x-app-layout>
