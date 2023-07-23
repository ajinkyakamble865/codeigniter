<?php $this->load->view('admin/header');?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Articles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Articles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <?php if ($this->session->flashdata('success') != "" ){?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
            <?php } ?>

            <?php if ($this->session->flashdata('error') != "" ){?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
            <?php } ?>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <form action="" method="get" id="searchFrm" name="searchFrm">
                            <div class="input-group mb-0">
                                <input type="text" value="" name="q" class="form-control" placeholder="search">
                                <div class="input-group-append">
                                    <button class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-tools">
                      <a href="<?php echo base_url().'admin/article/create';?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
                    </div>
                  </div>
                    <div class="card-body">
                      <table class="table">
                        <tr>
                          <th width="50">#</th>
                          <th>Name</th>
                          <th width="100">Status</th>
                          <th width="200" class="text-center">Action</th>
                        </tr>
                        
                        
                      </table>
                    </div>
             


            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer');?>

<script>
  function deleteCategory(id) {
    if (confirm('Are You Sure You Want To Delete Category')) {
      window.location.href='<?php echo base_url().'admin/category/delete/'?>'+id;
    }
  }
</script>