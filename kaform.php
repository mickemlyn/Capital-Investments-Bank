 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="RegisterForm" id="RegisterForm" class="form-signin">
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['UsernameExistsError'])){ echo "has-error"; } else{ echo ""; }?> ">
                    <input type="text" class="form-control" name="Username" class="TField" id="Username" placeholder="Username" <?php if(isset($_SESSION['UsernameYouEntered'])){ echo'value="'.$_SESSION['UsernameYouEntered'].'"'; } ?> required>
                 <span style="color:red;"for="Username">*</span>
                    </div>
                
                    <div class="form-group form-inline <?php if(isset($_SESSION['PasswordError'])){ echo "has-error"; } else{ echo ""; }?> ">     
                    <input type="password" class="form-control" name="Password"  class="TField" id="Password" placeholder="Password" min="4" required><span style="color:red;"for="Password"> * </span>     </div>
                <?php if(isset($_SESSION['PasswordError'])){?> 
                       <div class="small  text-danger"> <?php echo $_SESSION['PasswordError'];?> 
                </div> <?php } 
    
                else{   ?>
                <div class="small  text-muted" > Your Password Must Contain Atleast 6 characters & Atleast 1 Number ! </div>
                    
               <?php } ?>
                    
                
                    <div class="form-group form-inline">
                    <input type="number" class="form-control" name="UserLevel" class="TField" id="UserLevel" placeholder="UserLevel - 1,2,3,4" <?php if(isset($_SESSION['UserLevelYouEntered'])){ echo'value="'.$_SESSION['UserLevelYouEntered'].'"';  } ?> required maxlength="1" max="4" min="1"> <span style="color:red; "for="UserLevel">*</span>
                    </div>
                    
                    <div class="form-group form-inline <?php if(isset($_SESSION['EmailError'])){ echo "has-error"; } else{ echo ""; }?> "> 
                    <input type="email" class="form-control" name="Email" class="TField" id="Email" placeholder="Email" <?php if(isset($_SESSION['EmailYouEntered'])){ echo'value="'.$_SESSION['EmailYouEntered'].'"';  } ?> required>
                     <span style="color:red;"for="mail">*</span>
                    </div>
                    
                    <div class="form-group form-inline">
                    <input type="text" class="form-control" name="Fname" class="TField" id="Fname" placeholder="First Name" <?php if(isset($_SESSION['FnameYouEntered'])){ echo'value="'.$_SESSION['FnameYouEntered'].'"';  } ?> required pattern="[A-Za-z\\s]*">
                    <span style="color:red;"for="Fname">*</span>
                    </div>
                
                    <div class="form-group form-inline">
                    <input type="text" class="form-control" name="Lname" class="TField" id="Lname" placeholder="Last Name" <?php if(isset($_SESSION['LnameYouEntered'])){ echo'value="'.$_SESSION['LnameYouEntered'].'"';  } ?> pattern="[A-Za-z\\s]*">
                   
                    </div>
                   
                    <div class="form-group">
                    <input type="submit" class="btn btn-info " name="update" value="Update" >
                    
                    </div>
                </form>