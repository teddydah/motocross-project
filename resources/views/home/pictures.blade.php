<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <span>Photos</span>
            <h2>Photos</h2>
            <!--<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>-->
        </div>

        <!--<div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Tous</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>-->

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($pictures as $picture)
                <div class="col">
                    <div class="portfolio-wrap">
                        <img src="{{ url('/uploads/'.$picture->image) }}" class="img-fluid object-fit"
                             alt="{{ $picture->description }}">
                        <div class="portfolio-info">
                            <h4>{{ $picture->description }}</h4>
                            <h5>Photo n°{{ $picture->id }}</h5>
                            <div class="portfolio-links">
                                <a href="{{ url('/uploads/'.$picture->image) }}" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox"
                                   title="{{ $picture->description }} - Photo n°{{ $picture->id }}"><i
                                        class="ri-add-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
