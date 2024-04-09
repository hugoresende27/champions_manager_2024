<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="training"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Training Intensity'></x-navbars.navs.auth>
        <!-- End Navbar -->
        
            <br><br><br>
            <div class="container-fluid px-2 px-md-4">
                <div class="card card-body mx-3 mx-md-4 mt-n6">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Training Intensity</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('coach-settings.training.update', $coachSettings->game_id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="intensityRange">Intensity Level:</label>
                                            <hr>
                                            <input type="range" class="form-range" id="intensityRange" name="training"
                                                min="1" max="3" value="{{ $coachSettings->training }}">
                                                <div class="text-center">
                                                    <div id="intensityLevel">Medium</div>
                                                </div>
                                                <hr>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>
</x-layout>


<script>
    document.addEventListener("DOMContentLoaded", function() {


        var intensityRange = document.getElementById('intensityRange');
        var intensityLevel = document.getElementById('intensityLevel');
        // console.log(intensityLevel, intensityRange);

        function handleMouseMove(event) {
        // Your event handling code here
        
        console.log("Mouse moved!");
        var value = parseInt(intensityRange.value);
        var level = '';


            switch (value) {
                case 1:
                    level = 'Light';
                    break;
                case 2:
                    level = 'Medium';
                    break;
                case 3:
                    level = 'Heavy';
                    break;
                default:
                    level = '';
            }
            intensityLevel.textContent = level;

        // Remove the event listener after it has been executed once
        document.removeEventListener("mousemove", handleMouseMove);
        }

        // Attach the event listener to the document's mousemove event
        document.addEventListener("mousemove", handleMouseMove);



        intensityRange.addEventListener('input', function() {
            var value = parseInt(intensityRange.value);
            var level = '';

            switch (value) {
                case 1:
                    level = 'Light';
                    break;
                case 2:
                    level = 'Medium';
                    break;
                case 3:
                    level = 'Heavy';
                    break;
                default:
                    level = '';
            }
            
            intensityLevel.textContent = level;
        });
    });
</script>

