<?php
    use yii\jui\DatePicker;

?>

<div class="modal-dialog" role="document">

    <form method="post" action="#" class="modal-content">

        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>

        <div class="modal-body">
            <div class="clearfix col-xs-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, suscipit!</p>
            </div>

            <div class="clearfix">
                <div class="form-group col-xs-12 col-sm-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Your phone">
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                    <label for="exampleInputEmail1">Data</label>
                    <input type="date" class="form-control" id="visit-date" placeholder="Booking date">

                </div>



                <div class="form-group col-xs-12 col-sm-6">
                    <label for="avto">Avto</label>

                    <select class="form-control" id="avto">
                        <option>Audi</option>
                        <option>BMW</option>
                        <option>Nissan</option>
                        <option>Honda</option>
                        <option>Moskvich</option>
                    </select>
                </div>

                <div class="form-group col-xs-12">
                    <label for="avto">Proble description</label>

                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="send">Send</button>
        </div>

    </form>

</div>