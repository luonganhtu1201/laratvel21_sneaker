<li class="mega-parent pos-rltv"><a href="shop.html">{{$category->name}}</a>
    <div class="mega-menu-area mma-800"> 
        @if($category->children)
        
           @foreach($category->children as $children)
                <ul class="single-mega-item">
                    @include('frontend.includes.children_menus',['category'=>$children])
                </ul>
           @endforeach
        
         @endif                                        
    </div>
</li>