<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to your notes - Sample Note App</title>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/custom.css"  media="screen,projection"/>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?=base_url();?>static/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>static/js/materialize.min.js"></script>
    
</head>
<body>

<div class="container">
    
    <div class="row">
        <div class="col l10 s12 offset-l1 main">
           
            <h3>My notes</h3>
            
            <div class="hide-on-small-only relative">
                <div class="fixed-action-btn horizontal desktop">
                    <a class="btn-floating btn-large red">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul>
                        <li><a href="#session" class="btn-floating modal-trigger blue"><i class="material-icons">language</i></a></li>
                        <li><a href="#addnote" class="btn-floating modal-trigger green"><i class="material-icons">add</i></a></li>
                        <li><a href="<?=base_url()?>logout" class="btn-floating yellow darken-2"><i class="material-icons">exit_to_app</i></a></li>
                    </ul>
                </div>
            </div>
            <div class="fixed-action-btn click-to-toggle horizontal hide-on-med-and-up mobile">
                <a class="btn-floating btn-large red">
                    <i class="material-icons">menu</i>
                </a>
                <ul>
                    <li><a href="#session" class="btn-floating modal-trigger blue"><i class="material-icons">language</i></a></li>
                    <li><a href="#addnote" class="btn-floating modal-trigger green"><i class="material-icons">add</i></a></li>
                    <li><a href="<?=base_url()?>logout" class="btn-floating yellow darken-2"><i class="material-icons">exit_to_app</i></a></li>
                </ul>
            </div>
            
            <?php foreach ( $folder as $category ): ?>
                
                <h5><i class="material-icons">turned_in</i><?=$category['folder'];?></h5>
                <div class="collection">

                    <?php foreach ( $notes as $note ): ?>
                        <?php if ( $category['folder'] == $note['folder'] ) { ?>
                        <a href="<?=base_url()?>note/<?=$note['id']?>" class="collection-item blue-text">
                            <?=$note['title'];?> <small class="right">last edit: <?=$note['updatedat'];?></small>
                        </a>
                        <?php } ?>
                    <?php endforeach; ?>
                    
                </div>
                
            <?php endforeach; ?>
            
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds costing you <strong>{memory_usage}</strong>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            
        </div>
    </div>

</div>


<div id="addnote" class="modal">
    <div class="modal-content">
        <div class="row">    
        
            <h4><i class="small material-icons">insert_comment</i> Add note</h4>

            <?php echo form_open(); ?> 

                <div class="input-field col m6 s12">
                    <i class="material-icons prefix">title</i>
                    <input name="title" type="text" required>
                    <label for="title">Title</label>
                </div>

                <div class="input-field col m6 s12">
                    <i class="material-icons prefix">folder</i>
                    <input name="folder" type="text" list="hint"  required>
                    <label for="folder">Folder</label>
                    <datalist id="hint">
                    <?php foreach ( $folder as $category ): ?>
                        <option value="<?=$category['folder'];?>">
                    <?php endforeach; ?>
                    </datalist>
                </div>
                
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="text" class="materialize-textarea" required></textarea>
                    <label for="text">Text</label>
                </div>
                
                <button class="btn waves-effect waves-light blue" type="submit" name="action">Add
                    <i class="material-icons right">send</i>
                </button>

                <?php echo validation_errors('<p class="small">', '</p>'); ?>

            </form>
        </div>
    </div>
</div>

<div id="session" class="modal bottom-sheet">
     <div class="container">
        <div class="modal-content">
            <h4>[ DEV ] Session</h4>
            <pre>
                <?php print_r ($this->session->all_userdata()); ?>
            </pre>
        </div>
    </div>
</div>

<script>
    
<?php if ( $this->session->flashdata('messanger') != "" ){ ?>
setTimeout(function() { Materialize.toast('<?=$this->session->flashdata('messanger');?>', 2500) } , 400 )
<?php } ?>

$(document).ready(function(){
    $('.modal-trigger').leanModal();
});

</script>

</body>
</html>