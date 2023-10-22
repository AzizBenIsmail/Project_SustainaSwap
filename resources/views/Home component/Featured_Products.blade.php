<div class="modal fade"    id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('adminChat.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" rows="4">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" rows="4">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                </div>

                <div class="center justify">
                    <button type="submit" class="btn btn-primary mb-2 px-5" style="background-color: #FC6F00; width: 100%; border: none; ">Send Message</button>
                    <button type="button" class="btn btn-secondary px-5"  data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<section class="featured-product section-padding">

    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-5">Featured Item</h2>
            </div>

            <form action="{{ route('indexmain') }}" method="GET" class="my-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search a Item...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label for="sort" class="text-muted">Sort  :</label>
                            <select name="sort" class="form-control" id="sort">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="state" {{ request('sort') == 'state' ? 'selected' : '' }}>State</option>
                                <option value="category" {{ request('sort') == 'category' ? 'selected' : '' }}>Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label for="category" class="text-muted">Category :</label>
                            <select name="category" class="form-control" id="category">
                                <option value="" {{ request('category') == '' ? 'selected' : '' }}>All category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>


        @foreach ($items as $item)
                <div class="col-lg-3 col-12 mb-3">
                    <div class="product-thumb">
                        <a href="{{ route('showmain', $item->id) }}">
                            <img src="{{ asset('uploads/' . $item->picture) }}" alt="" width="250" height="150">
                        </a>

                        <div class="product-top d-flex">
                                {{--            <span class="product-alert me-auto">New Arrival</span--}}

                            <a href="#" class="bi-heart-fill product-icon"></a>
                        </div>
                        <div class="product-info d-flex">
                            <div>
                                <h5 class="product-title mb-0">
                                    <a href="{{ route('showmain', $item->id) }}" class="product-title-link">{{ $item->title }}</a>
                                </h5>

                                <p class="product-p">{{ $item->category->name }}</p>
                            </div>
                            <div>
                                <small class="product-price text-muted ms-auto">{{ $item->state }}</small> . condition
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Message</button>


                        <a href="{{ route('chatIndex', $item->id) }}" class="btn btn-primary" style="background-color: #FF7F50; color: #fff;"> Chat</a>
                        <a href="{{ route('showmain', $item->id) }}" class="btn btn-info">Show</a>
                    </div>
                </div>


            @endforeach
        </div>

        @if ($items->hasPages())
            <ul class="pagination">
                <!-- Lien "Previous" -->
                @if ($items->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $items->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                <!-- Numéro de page actuel -->
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">{{ $items->currentPage() }}</span>
                </li>

                <!-- Lien "Next" -->
                @if ($items->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $items->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        @endif


        </div>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6535934ba84dd54dc483f1ac/1hdckeom4';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

    const actionButtons = document.querySelectorAll('.action-btn');
        const actionMenus = document.querySelectorAll('.action-menu');

        actionButtons.forEach((btn, index) => {
            const actionMenu = actionMenus[index];
            actionMenu.style.display = 'none'; // Hide the menu initially

            btn.addEventListener('click', () => {
                actionMenu.style.display = actionMenu.style.display === 'block' ? 'none' : 'block';
            });
        });
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('delete-post')) {
                e.preventDefault();
                const postId = e.target.getAttribute('data-post-id');

                    const deleteForm = document.getElementById('delete-post-form');
                    deleteForm.action = `/admin/posts/${postId}`;
                    deleteForm.submit();

            }
        });

        $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      var modal = $(this)
      modal.find('.modal-title').text('New message')
    })
    </script>


</section>



