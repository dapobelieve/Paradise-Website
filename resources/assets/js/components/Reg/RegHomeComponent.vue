<template>
  <div class="store-home">
        <div class="row">
            <div class="main col-md-12">
                <h1 class="page-title text-center"><strong>Funaab Registrations</strong></h1>
                <div class="separator"></div>
                <div class="tab-content clear-style">
                    <div class="tab-pane active">                       
                        <div class="row masonry-grid-fitrows grid-space-10">
                          <div class="col-sm-6 col-md-4">
                            <div class="image-box style-2 mb-20 bordered text-center">
                              <div class="body shadow ">
                                <h3>Part Time Programme</h3>
                                <div class="separator"></div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                <router-link class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear" :to="{name: 'part-time'}">Start Now<i class="fa fa-arrow-right pl-10"></i></router-link>
                                <a ></a>                       
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4">
                            <div class="image-box style-2 mb-20 bordered text-center">
                              <div class="body shadow ">
                                <h3>Post Graduate Programme</h3>
                                <div class="separator"></div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                <a class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear">Start Now<i class="fa fa-arrow-right pl-10"></i></a>                       
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4">
                            <div class="image-box style-2 mb-20 bordered text-center">
                              <div class="body shadow ">
                                <h3>Pre Degree Programme</h3>
                                <div class="separator"></div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                <a class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear">Start Now<i class="fa fa-arrow-right pl-10"></i></a>                       
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>
<script>
export default {
  mounted() {
    // alert('Registrations Here')
  }
}
</script>
<style>
.desc {
  color: black;
  font-weight: bolder;
}
</style>