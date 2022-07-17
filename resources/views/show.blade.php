@foreach($images as $image)
 
 <div> 
    <img src="{{route('getfile', $image)}}"  class="img-responsive" />
 </div>
                  
 
 @endforeach