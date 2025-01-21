@extends('layouts.tabler')

@section('title')
    Debts Management 
@endsection

@section('me')
    @parent
@endsection

@section('Debts')
<!-- the debts dashinfo --->
         <!-- when no data we shall see this ---->
       

 
<!-- the main debts table ---->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Customer Debts</h3>
            
          <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-report">
    Add Debters
    <div class="mx-2 d-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
        </svg>
    </div>
</button>

<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create A Debter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Customer Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Name of Customer in Debt">
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Customer Set</label>
                            <input type="text" class="form-control" name="example-text-input" placeholder="What do you owe?">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Reporting period</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount in Debt</label>
                        <input type="number" class="form-control" name="example-text-input" placeholder="Tsh.00/=">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount Received</label>
                        <input type="number" class="form-control" name="example-text-input" placeholder="Leave empty if not Received">
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Additional information</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Create new Debter
                </a>
            </div>
        </div>
    </div>
</div>

        </div>
        <div class="card-body border-bottom py-3">
           
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">
                            <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices">
                        </th>
                        <th class="w-1">No.
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 15l6 -6l6 6" />
                            </svg>
                        </th>
                        <th>Customer Name</th>
                        <th>Customer Set</th>
                        <th>Created Date</th>
                        <th>Debts Amount</th>
                        <th>Received Amount</th>
                        <th>Balance Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
          
            
                    @foreach ($debts as $debt)
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" aria-label="Select">
                            </td>
                            <td>{{ $debt['no'] }}</td>
                            <td>{{ $debt['customer_name'] }}</td>
                            <td>{{ $debt['customer_set'] }}</td>
                            <td>{{ $debt['created_date'] }}</td>
                            <td>{{ number_format($debt['debts_amount'], 2) }}</td>
                            <td>{{ number_format($debt['received_amount'], 2) }}</td>
                            <td>{{ number_format($debt['balance_amount'], 2) }}</td>
                            <td>{{ $debt['due_date'] }}</td>
                            <td>{{ $debt['status'] }}</td>
                            <td>
                                @if($debt->amount - $debt->amount_paid == 0)
                                    <span class="text-green-500 font-semibold">Paid</span>
                                @elseif($debt->due_date < now())
                                    <span class="text-red-500 font-semibold">Overdue</span>
                                @else
                                    <span class="text-yellow-500 font-semibold">Pending</span>
                                @endif
                                <a href="{{ route('debts.edit', $debt['id']) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('debts.destroy', $debt['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
            <ul class="pagination m-0 ms-auto">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                        prev
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        next
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@if($debts->isEmpty())
                <div class="text-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="mx-auto mb-3">
                        <path stroke="none" d="M0 0h24V0z" fill="none" />
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 9.86a4.5 4.5 0 0 0 -3.214 1.35a1 1 0 1 0 1.428 1.4a2.5 2.5 0 0 1 3.572 0a1 1 0 0 0 1.428 -1.4a4.5 4.5 0 0 0 -3.214 -1.35zm-2.99 -4.2l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm6 0l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                    </svg>
                    <p class="text-xl font-semibold">Sorry, no data was found</p>
                </div>
            @else
                <div class="d-flex">
                </div>
            @endif

@endsection