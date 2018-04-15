<!DOCTYPE html>
<html>
    <head>
        <?php require "inc/head.php";?>
    </head>

    <body data-ma-theme="indigo">
        <main class="main">
            <?php require "inc/header.php"?>
            
            <?php require "inc/aside.php"?>

            <section class="content">
                <div class="content__inner content__inner--sm" style="max-width:1100px;">
                    <div class="card">
                        <div class="card-header nav-bar">
                            <form action="?cmd=addMedServices" method="post" style="width:100%;">
                                <div class="row">
                                  <div class="col-md-12">
                                       <h4>Ավելացնել բժշկական ծառայություն</h4>                                      
                                  </div>
                                    <div class="col-md-4">
                                        <input type="text" name="title_am" placeholder="Վերնագիր AM" class="form-control" required>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    <div class="col-md-4"> 
                                        <input type="text" name="title_en" placeholder="Վերնագիր EN" class="form-control" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                       <div class="col-md-4">
                                        <input type="text" name="title_ru" placeholder="Վերնագիր RU" class="form-control" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <!---   
                                        <div class="col-md-4"> 
                                            <textarea class="form-control" name="descr_am" placeholder="Նկարագրություն AM" style="min-height:180px"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                        <div class="col-md-4"> 
                                             <textarea class="form-control " name="descr_en" placeholder="Նկարագրություն EN" style="min-height:180px"></textarea>  
                                             <i class="form-group__bar"></i>
                                        </div>          
                                        <div class="col-md-4">   
                                             <textarea class="form-control " name="descr_ru" placeholder="Նկարագրություն RU" style="min-height:180px"></textarea>
                                             <i class="form-group__bar"></i>
                                           </div>   
                                        -->   
                                    <div class="col-md-12"><br>
                                         <div class="col-md-3" style="float:right">
                                            <button type="submit"class="btn btn-secondary btn-block">Ավելացնել</button>
                                        </div>
                                    </div>       
                                </div>
                            </form>
                        </div>
                    </div>
                   <div class="col-md-12">
                      <br>
                       <h4>Բժշկական ծառայություններ</h4> 
                       <br>                         
                      </div>
                        <?php foreach($cnt->getMedServices() as $med_services) {?>
                  <div class="card">
                        <div class="card-block" style="padding: 1.4rem 2.1rem 0;">
                            <div class="listview__actions pull-right" style="font-size:16px; float:right">
                                <i class="zmdi zmdi-delete actions__item" onClick="removemed_services(<?php echo $med_services['id']?>)"></i>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                   <h6><b><?php echo $med_services['title_am']?></b></h6>
                              </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="med_services, title_am, id, <?php echo $med_services['id']?>" value="<?php echo $med_services['title_am']?>" placeholder="Անվանում АМ">
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="med_services, title_en, id, <?php echo $med_services['id']?>" value="<?php echo $med_services['title_en']?>" placeholder="Անվանում EN">
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="med_services, title_ru, id, <?php echo $med_services['id']?>" value="<?php echo $med_services['title_ru']?>" placeholder="Անվանում RU">
                                    <i class="form-group__bar"></i>
                                </div>
                                 <div class="col-md-4">
                                    <textarea class="form-control live" data-live="med_services, descr_am, id, <?php echo $med_services['id']?>" placeholder="Նկարագրություն AM" style="min-height:150px"><?php echo $med_services['descr_am']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control live" data-live="med_services, descr_en, id, <?php echo $med_services['id']?>" placeholder="Նկարագրություն EN" style="min-height:150px"><?php echo $med_services['descr_en']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                                 <div class="col-md-4">
                                    <textarea class="form-control live" data-live="med_services, descr_ru, id, <?php echo $med_services['id']?>" placeholder="Նկարագրություն RU" style="min-height:150px"><?php echo $med_services['descr_ru']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $group = 'med-services';?>
                                    <?php $parent = $med_services['id'];?>
                                    <?php $multiple = false;?>
                                    <?php $photos = $cnt->getPhoto($group, $parent);?>
                                    <div class="p-3"></div>
                                    <button class="btn btn-info photo-btn">
                                        <i class="fa fa-cloud-upload fa-2x"></i>
                                        <input type="file" onChange="addPhoto('<?php echo $group?>', '<?php echo $parent?>', this, '<?php echo $group?>'<?php if($multiple===false){?>, 'change'<?php }?>)" style="opacity:0;position:absolute;top:0;left:0;width:100%;height:100%;" <?php if($multiple===true){?>multiple<?php }?>> 
                                    </button>
                                    <?php foreach($photos as $photo){?>
                                    <div class="photo-box">
                                        <span onClick="removePhoto('<?php echo $group?>', <?php echo $photo['photoID']?>)">x</span>
                                        <img src="/public/gallery/<?php echo $group?>/small/<?php echo $photo['photoID']?>.jpg">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                            <?php }?>
                        <div class="p-1"></div>
                    
                    
                </div>
                
                <?php require "inc/footer.php"?>
                    
            </section>
        </main>
 
    </body>
</html>