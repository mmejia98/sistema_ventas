<div class="container">
    <form method="post" action="AddUser" enctype="multipart/form-data">
        <div>
            <output id="imageUser">
                <img src="<?php 
                    if($model1 != null){
                        if($model1->Image != null){
                            echo 'data:image/jpeg;base64,'.$model1->Image;
                        }else{
                            echo URL.RQ.'images/default.png';
                        }
                    }else{
                        echo URL.RQ.'images/default.png';
                    }
                ?>" class="imageUser" />
            </output>
        </div>
        <div>
            <div>
                <label for="files" class="btn btn-primary">Cargar foto</label>
                <input type="file" accept="image/*" name="file" id="files">
            </div>
        </div>
        <div>
            <h3>
                Registrar Usuarios
            </h3>
        </div>
        <div class="form-group">
            <input type="text" name="nid" class="form-control" placeholder="NID" autofocus 
            value="<?php echo $model1->NID ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="nid"><?php echo $model2->NID ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name"
            value="<?php echo $model1->Name ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="name"><?php echo $model2->Name ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Last Name"
            value="<?php echo $model1->LastName ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="lastname"><?php echo $model2->LastName ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number"
            value="<?php echo $model1->Phone ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="phone"><?php echo $model2->Phone ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="text" name="direction" class="form-control" placeholder="Ingrese la dirección"
            value="<?php echo $model1->Direction ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="direction"><?php echo $model2->Direction ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="User"
            value="<?php echo $model1->User ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="user"><?php echo $model2->User ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="mail" name="email" class="form-control" placeholder="Email"
            value="<?php echo $model1->Email ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="email"><?php echo $model2->Email ?? "" ?></span>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password"
            value="<?php echo $model1->Password ?? "" ?>" onkeypress="new User().ClearMessages(this);"/>
            <span class="text-danger" id="password"><?php echo $model2->Password ?? "" ?></span>
        </div>
        <div class="form-group">
            <select class="form-control" name="role" onchange="new User().ClearMessages(this);">
            <?php
                if($model2 == null){
                    echo "<option>Seleccione un rol</option>";
                }
                foreach($model3 as $key => $value){
                    echo "<option>".$value["Role"]."</option>";
                }
            ?>          
            </select>
            <span class="text-danger" id="role"><?php echo $model2->Role ?? "" ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div class="form-group">
            <a href="<?php echo URL ?>User/Cancel" class="btn btn-warning btn-block text-white">Cancel</a>
        </div>
        <div class="form-group">
            <label class="text-success"></label>
        </div>
    </form>
</div>