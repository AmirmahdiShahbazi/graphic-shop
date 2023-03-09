
<!---------------------------------->
<div class="top2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login">
                    <a href="#" class="mybtn"><i class="fa fa-user-plus"></i>ثبت نام</a>
                    <a href="#" class="mybtn"><i class="fa fa-user-o"></i>ورود</a>
                    <a href="{{route('home.basket.items')}}" class="mybtn"><i class="fa fa-cart-arrow-down"></i>سبد</a>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{route('home.products.all')}}" >
                    <input type="text" name="search" placeholder="کالای مورد نظر را جستجو کنید">
                    <button type="submit" ><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!---------------------------------->
<br>
