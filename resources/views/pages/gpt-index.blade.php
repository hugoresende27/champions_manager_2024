<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="squad"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Squad"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
   
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Ask something to ChatGPT</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('chatgpt.ask') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control text-center" name="prompt" placeholder="Ask something...">
                                </div>

                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
          

</x-layout>


