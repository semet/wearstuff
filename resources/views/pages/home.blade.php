<x-layouts.main>
    <x-slot:title>
    Homepage
    </x-slot:title>
    <!-- Hero Start -->
    <x-home.hero/>
    <!--end section-->
    <!-- Hero End -->

    <!-- Features Start -->
    <x-home.features/>
    <!--end container-->
    <!-- Features End -->

    <!-- Start -->
    <section class="section">
        {{-- Top Sales --}}
        <x-home.top-sales/>
        {{-- Most Viewed --}}
        <x-home.most-viewed/>
        {{-- CTA --}}
        <x-home.call-to-action/>
        {{-- Latest Products --}}
        <x-home.latest-products/>
    </section>
    <!--end section-->
    <!-- End -->
</x-layouts.main>
