<ul>
    @foreach($categories as $category)
            <li>{{$category->name}}</li>
                <ul>
                    @foreach($category->items as $item)
                        <li>{{$item->title}}</li>
                        <li>{{$item->big_picture_link}}</li>
                        {{-- <li>=</li> --}}
                        <br>
                    @endforeach
                </ul>
    @endforeach
</ul>