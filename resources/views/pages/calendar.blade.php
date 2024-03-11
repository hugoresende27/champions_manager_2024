<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="calendar"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Calendar"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
      
                <div id="calendar"></div>

                <script src="{{asset('js/calendar.js')}}"></script>
              
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>


<style>
    #calendar {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

.calendar-header {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.calendar-table {
    width: 100%;
    border-collapse: collapse;
}

.calendar-table th,
.calendar-table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}
</style>
