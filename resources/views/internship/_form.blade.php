<form class="form-horizontal" action="" method="post" style="width:1000px;height:600px;">
    {{csrf_field()}}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">岗位名称</label>

        <div class="col-sm-5">
            <input type="text" name="Internship[name]" value="{{old('Internship')['name']?old('Internship')['name']:$internship->name}}" class="form-control" id="name" placeholder="请输入岗位名称">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Internship.name')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="company" class="col-sm-2 control-label">公司</label>

        <div class="col-sm-5">
            <input type="text" name="Internship[company]" value="{{old('Internship')['company']?old('Internship')['company']:$internship->company}}" class="form-control" id="company" placeholder="请输入公司名称">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Internship.company')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="contact" class="col-sm-2 control-label">详情</label>
        <div class="col-sm-5">
            <input  style="height:200px;"type="text" name="Internship[detail]" value="{{old('Internship')['detail']?old('Internship')['detail']:$internship->detail}}" class="form-control" id="company" placeholder="请输入详情">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Internship.detail')}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="contact" class="col-sm-2 control-label">联系方式</label>

        <div class="col-sm-5">
            <input type="text" name="Internship[contact]" value="{{old('Internship')['contact']?old('Internship')['company']:$internship->contact}}" class="form-control" id="contact" placeholder="请输入联系方式">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{$errors->first('Internship.contact')}}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>