
<h2>Insertar Posts</h2>
<?php echo form_open('CRUD/insertar'); ?> 
<div class="row">
      <div class="col-25">
        <label for="titulo">Titulo</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?=set_value('TITULO_POST'); ?>"  name="TITULO_POST" placeholder="Escribe el titulo de tupost..">
          <?=form_error('TITULO_POST');?>
    
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Descripcion</label>
      </div>
      <div class="col-75">
      <textarea  name="DESCRIPCION_POST" value="<?=set_value('DESCRIPCION_POST'); ?>" placeholder="Describe el post.." style="height:200px"></textarea>  </div>
      <?=form_error('DESCRIPCION_POST');?>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Contenido</label>
      </div>
     <div class="col-75">
       <textarea  name="CONTENIDO_POST" value="<?=set_value('CONTENIDO_POST'); ?>" placeholder="Redacta el post.." style="height:200px"></textarea> </div>
      <?=form_error('CONTENIDO_POST');?>
    
    </div>
    <div class="row">
      <input type="submit" value="Crear">
    </div>
</form>
