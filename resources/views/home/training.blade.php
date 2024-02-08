<section id="counts" class="counts">
    <div class="container position-relative">

        <div class="text-center title">
            <h3>{{ strtoupper($training->name) }}</h3>
            <h4>{{ $training->address }}</h4>
        </div>

        <div class="row counters">

            <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $training->length }}"
                          data-purecounter-duration="1"
                          class="purecounter"></span>
                <p>Longueur (en mètres)</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $training->width }}"
                          data-purecounter-duration="1"
                          class="purecounter"></span>
                <p>Largeur (en mètres)</p>
            </div>
            <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $training->max_people }}"
                          data-purecounter-duration="1"
                          class="purecounter"></span>
                <p>Nombre de participants (série adulte)</p>
            </div>
            <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                          class="purecounter"></span>
                <p>Nombre de participants (série enfant)</p>
            </div>
        </div>
    </div>
</section>
