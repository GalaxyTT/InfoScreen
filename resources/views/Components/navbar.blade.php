<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto lg:block mr-10" src="/logo.png" alt="Your Company">
          </div>
          <div class="sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <a href="{{route('werbung')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page"  id="noneee">Werbescreen</a>
  
              <a href="{{route('info')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page"  id="noneee">Infoscreen</a>

              <a href="{{route('classes')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="classes">Klassen</a>
  
              <a href="{{route('teachers')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="teacher">Lehrer</a>
  
              <a href="{{route('rooms')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="rooms">Räume</a>
              
              <a href="{{route('groups')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="groups">Gruppen</a>
              
              <a href="{{route('students')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="students">Schüler</a>
              
              <a href="{{route('settings')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="settings">Einstellungen</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <script>
      var url = document.location.href;
      var navs = document.getElementsByTagName("a");
      Array.prototype.forEach.call(navs, (nav) => {
                    if(url.includes(nav.id)){
                        nav.style = "background-color: rgb(55 65 81); color: white;"
                    }
                    else{
                        nav.style = "";
                    }
                });
  </script>