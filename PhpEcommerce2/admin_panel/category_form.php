<form class="form-horizontal" action="" method="post">
               <div class="form-group">
                    <label for="category" class="control-label col-xs-2">Category</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="category_name" onkeyup="blank_me(this.id)" placeholder="Category" required>

                        <div id="category_name_error" style="color: red; display: none;">Category required</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="details" class="control-label col-xs-2">Details</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" id="category_details" placeholder="Details"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="button" class="btn btn-primary" onclick="insert_update_category(0)">Insert Category</button>
                        <button class="btn btn-default" onclick="show_category_form()">Reset</button>
                    </div>
                </div>
            </form>