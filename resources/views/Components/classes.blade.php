<div class="ml-8 h-screen grid grid-cols-3 gap-8 overflow-y-auto scrollbar mr-4">
    @foreach($classes as $class)
        <div class="ml-8 mt-8 h-60 w-80 rounded-lg even:bg-green-100 shadow-lg even:shadow-green-300/70 odd:bg-blue-200 odd:shadow-blue-300/70 text-center">
            <h1>{{$class->klasse}}</h1>
            <p>LELE</p>
        </div>   
    @endforeach
    <div class="h-screen">
        <button onclick="createPopUpForm(document.getElementById('form'))" class="bg-cyan-500 shadow-lg shadow-cyan-500/50 rounded-full mr-8 hover:scale-110 transition-all duration-200 absolute bottom-8 right-2">
            <svg version="1.1" class="p-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                width="60px" height="60px" viewBox="0 0 45.402 45.402" style="enable-background:new 0 0 45.402 45.402;"
	                xml:space="preserve" fill="white">
	            <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141
		                c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27
		                c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435
		                c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"/>
            </svg>
        </button>             
    </div>
    <div class="h-screen w-3/4">
        <div style="display:none">
            <form id="form" action="{{route('createClass')}}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">

                <label for="students">Other Names:</label>
                <div id="otherStudentsContainer">
                    <div class="otherStudentsField">
                        <input type="text" name="students[]">
                    </div>
                    <button type="button" id="addAnotherStudent">Add Other Name</button>
                </div>
                <input type="submit" value="Submit">
                <input type="button" value="Cancel" onclick="removeForm();">
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('addAnotherStudent').addEventListener('click', function() {
                        var newInputField = '<div class="otherStudentsField"><input type="text" name="students[]"></div>';
                        document.getElementById('otherStudentsContainer').insertAdjacentHTML('beforeend', newInputField);
                    });
                });
            </script>
        </div>
    </div>
</div>
<script>
    function createPopUpForm(form) {
    var container = document.createElement('div');
    container.classList.add('pop-up-container');

    container.appendChild(form);
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';


    document.body.appendChild(container);
}
function removeForm(){
    const form = document.getElementById('form');
    form.parentNode.removeChild(form);

    // Enable pointer events
    document.body.style.pointerEvents = 'auto';
}

</script>

