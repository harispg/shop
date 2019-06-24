@extends('admin.master')

@section('content')
<categories-component inline-template>
  <div>
    <div class="wrapper wrapper-content animated fadeInRight pb-0">
      <h1>Products categories</h1>

      @can('categories.create')
      <new-category @new-category="addItem"></new-category>
      @endcan
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox ">
            <div class="ibox-title">
              <h5>Categories table</h5>
            </div>
            <div class="ibox-content">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover categories-table" >
                  <thead>
                    <tr>
                      <th>Date modified</th>
                      <th>Category name</th>
                      <th>Description</th>
                      <th>Photo</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
          <tr class="gradeA" v-for="item in this.items" :key="item.id">
              <td name="date" v-text="item.updated_at"></td>
              <td name="name" v-text="item.name"></td>
              <td name="description" v-text="item.description"></td>
              <td name="photo">
                <img :src="'/'+item.thumbnail" width="100" height="100" />
              </td>
              <td name="edit" class="center">
                <edit-category :category="item" @category_updated="removeItem"></edit-category>
              </td>
              <td name="delete" class="center">
                <button class="btn btn-outline-primary delete" @click="deleteRow(item)">Delete</button>
              </td>
          </tr>
          </tbody>
        </table>
        <paginator :data_set="dataSet" @updated="fetch"></paginator>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</categories-component>
@endsection