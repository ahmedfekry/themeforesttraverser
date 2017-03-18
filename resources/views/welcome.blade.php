<ul>
    @foreach($categories as $category)
            <li><a href="{{url('/category/'.$category->name)}}" >{{$category->name}}</a> </li>
                <ul>
                    @foreach($category->items as $item)
                        <li>{{$item->title}}</li>
                        <li>{{$item->big_picture_link}}</li>
                        <br>
                    @endforeach
                </ul>
    @endforeach
</ul>