<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    
    <title>OLOGRAM test</title>

</head>
<body>

  {{-- This is the navigation bar on the top --}}
  <nav class="navbar navbar-light navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" href="/main">OLOGRAM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
          </li>
        </ul>
        <form class="d-flex">
          <input type="search" class="form-control" id="search-input" placeholder="Search docs..." aria-label="Search docs for..." autocomplete="off" data-bd-docs-version="5.0">
          <button class="btn btn-outline-success" type="submit" >Search</button>
        </form>
      </div>
    </div>
  </nav>
  
  {{-- This is where the main components will be placed --}}
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h1> WELCOME TO OLOGRAM </h1><br>

        <!-- this part is needed to show the success message from the routing file with post -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        
        <!-- show error message from redirection -->
        @if (\Session::has('error'))
        <div class="alert alert-danger alert-block">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
        @endif

        <!-- show error messages if there are any from validation -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <div class="accordion" id="accordionExample">

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                BED vs GTF
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <!-- This is the actual form -->
                <form action='/main' method='POST' enctype="multipart/form-data" >
                  @csrf 
                  <!-- @csrf is mandatory for forms with post method -->
                  <div class="row">
                    <div class="col-sm-4 ">

                      <div class="input-group mb-3">
                        <span class="input-group-text " id="basic-addon0" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="Required email address to send the final results to.">EMAIL</span>
                        <input type="email" class="form-control form-control-sm" id="exampleFormControlInput1" name='email' value="{{ old('email') }}" placeholder="name@example.com"
                         data-bs-toggle="tooltip" data-bs-placement="top" title="Required email address to send the final results to.">
                      </div>

                      <div class="input-group mb-3">
                        <input class="form-control " id="formFileSm1" name="gtf" type="file" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="The GTF file of interest. Enrichment of the query will be calculated against the features it describes (e.g. exon, transcript, promoter…).">
                        <span class="input-group-text" id="basic-addon1" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="The GTF file of interest. Enrichment of the query will be calculated against the features it describes (e.g. exon, transcript, promoter…).">GTF</span>
                      </div>

                      <div class="input-group mb-3">
                        <input class="form-control " id="formFileSm2" name="bed" type="file" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="BED file containing the set of regions for which the enrichment will be calculated.">
                        <span class="input-group-text " id="basic-addon2" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="BED file containing the set of regions for which the enrichment will be calculated.">BED</span>
                      </div>

                      <div class="input-group mb-3">
                        <input class="form-control " id="formFileSm3" name="chr" type="file" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="Chromosome sizes ; Tabulated two-columns file. Chromosomes as column 1, sizes as column 2.">
                        <span class="input-group-text " id="basic-addon3" data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="Chromosome sizes ; Tabulated two-columns file. Chromosomes as column 1, sizes as column 2.">CHR</span>
                      </div>

                      <button type="submit" class="btn btn-primary">Start job</button></br><br>

                    </div>
                    
                    
                    <div class="col-sm">
                      <div class="col text-center">
                        <div class="accordion" id="accordionExample2">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingone-advanced">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-advanced" aria-expanded="true" aria-controls="collapseOne-advanced">
                                Advanced options
                              </button>
                            </h2>
                            <div id="collapseOne-advanced" class="accordion-collapse collapse" aria-labelledby="headingone-advanced" data-bs-parent="#accordionExample2">
                              <div class="accordion-body">
                                <div class="row">
                                  <div class="col-sm-3 text-start">

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                      <label class="form-check-label" for="defaultCheck1" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title=" Force-chrom-gtf : Discard silently, from GTF, genes outside chromosomes defined in “Chromosome sizes” file.">
                                        Force-chrom-gtf
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                      <label class="form-check-label" for="defaultCheck2" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Force-chrom-peak : Discard silently, from query regions file, regions outside chromosomes defined in “Chromosome sizes”.">
                                        Force-chrom-peak
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                      <label class="form-check-label" for="defaultCheck3" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Force-chrom-more-bed : Discard silently, from --more-bed files, regions outside chromosomes defined “Chromosome sizes”.">
                                        Force-chrom-more-bed
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                      <label class="form-check-label" for="defaultCheck4" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Display-fit-quality : Display the negative binomial fit quality on the diagrams. Also draws temporary file histograms for each combination">
                                        Display-fit-quality
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                      <label class="form-check-label" for="defaultCheck4" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Coord-flip : The horizontal axis becomes vertical, and vertical becomes horizontal">
                                        Coord-flip
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                      <label class="form-check-label" for="defaultCheck4" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Hide-undef : Do not display combinations if this column has undefined value (typically summed_bp_overlaps_pvalue)">
                                        Hide-undef
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                      <label class="form-check-label" for="defaultCheck4" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Pval-threshold : Hide combinations for which summed_bp_overlaps_pvalue is not lower or equal to --pval-threshold.">
                                        Pval-threshold
                                      </label>
                                    </div>
                                    
                                  </div>

                                  <div class="col-sm-5 text-start">

                                    <div class="input-group mb-3">
                                      <input class="form-control" type="file" id="formFileMultiple" multiple data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="More BED : A list of bed files to be considered as additional reference annotations (i.e in addition to gene centric features).">
                                      <span class="input-group-text" id="basic-addon1" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="More BED : A list of bed files to be considered as additional reference annotations (i.e in addition to gene centric features).">More BED</span>
                                    </div>

                                    <div class="input-group mb-3">
                                      <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="More BED labels : A comma separated list of labels for “Additional Reference regions”. Used for plotting.">More BED labels</span>
                                      <textarea class="form-control" aria-label="With textarea" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="More BED labels : A comma separated list of labels for “Additional Reference regions”. Used for plotting."></textarea>
                                    </div>

                                     <div class="input-group mb-3">
                                      <input class="form-control " id="formFileSm1" name="gtf" type="file" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="BED incl : A BED file. Only these regions will be considered for analysis (opposite of “Exclusion file “).">
                                      <span class="input-group-text" id="basic-addon1" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="BED incl : A BED file. Only these regions will be considered for analysis (opposite of “Exclusion file “).">BED incl</span>
                                    </div>

                                    <div class="input-group mb-3">
                                      <input class="form-control " id="formFileSm2" name="bed" type="file" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="BED excl : A BED file. These regions will not be considered for analysis (opposite of “Restriction file “).">
                                      <span class="input-group-text " id="basic-addon2" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="BED excl : A BED file. These regions will not be considered for analysis (opposite of “Restriction file “).">BED excl</span>
                                    </div>

                                  </div>

                                  <div class="col-sm text-start">

                                    <div class="input-group mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Upstream : Extend the TSS and TTS of in 5' by a given value. (default: 1000)">Upstream</span>
                                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Upstream : Extend the TSS and TTS of in 5' by a given value. (default: 1000)">
                                    </div>

                                    <div class="input-group mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Downstream : Extend the TSS and TTS of in 3' by a given value. (default: 1000)">Downstream</span>
                                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" data-bs-toggle="tooltip" data-bs-placement="top" 
                                      title="Downstream : Extend the TSS and TTS of in 3' by a given value. (default: 1000)">
                                    </div>

                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort features
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">None</a></li>
                                        <li><a class="dropdown-item" href="#">nb_intersections_expectation_shuffled</a></li>
                                        <li><a class="dropdown-item" href="#">nb_intersections_variance_shuffled</a></li>
                                        <li><a class="dropdown-item" href="#">nb_intersections_negbinom_fit_quality</a></li>
                                        <li><a class="dropdown-item" href="#">nb_intersections_log2_fold_change</a></li>
                                        <li><a class="dropdown-item" href="#">nb_intersections_true</a></li>
                                        <li><a class="dropdown-item" href="#">nb_intersections_pvalue</a></li>
                                        <li><a class="dropdown-item" href="#">summed_bp_overlaps_expectation_shuffled</a></li>
                                        <li><a class="dropdown-item" href="#">summed_bp_overlaps_variance_shuffled</a></li>
                                        <li><a class="dropdown-item" href="#">summed_bp_overlaps_negbinom_fit_quality</a></li>
                                        <li><a class="dropdown-item" href="#">summed_bp_overlaps_true</a></li>
                                        <li><a class="dropdown-item" href="#">summed_bp_overlaps_pvalue</a></li>
                                      </ul>
                                    </div>
                                  
                                  </div>


                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>
                  

                </form> 
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                BED vs GTF (keys/values)
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                BED vs BED
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="heading4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                BED vs BED (Combinations)
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the Fourth item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  {{-- <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
