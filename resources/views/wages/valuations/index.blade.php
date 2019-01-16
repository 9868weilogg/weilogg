@extends('wages.layouts.app')

@push('title')
Valuations
@endpush

@section('content')

@push('css')
<style>
body {
  background: rgba(0,0,0,0.05);
}

table {
  margin: 10px;
}
</style>
@endpush

<section class="probootstrap-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Watchlist</h3>
            <table class="table">
              <thead>
                <th>Name</th>
                <th>Price</th>
              </thead>
              <tbody>
                <tr>
                  <td>Stock Name</td>
                  <td>Price</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <div class="col-md-6 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Search</h3>
            <input type="text" class="form-control">
            <table class="table">
              <thead>
                <th>Name</th>
                <th>Price</th>
              </thead>
              <tbody>
                <tr>
                  <td>Stock Name</td>
                  <td>Price</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Fundamental Data</h3>
            <table class="table">
              <thead>
                <th>FYE</th>
                <th>Stock</th>
                <th>PE/ Book Value</th>
                <th>Dividend</th>
                <th>EPS</th>
                <th>Net Profit GR</th>
                <th>Revenue</th>
                <th>Cash</th>
                <th>Loan</th>
                <th>Gearing</th>
                <th>FCF</th>
                <th>GP Cashflow</th>
                <th>Net Margin</th>
                <th>ROE</th>
                <th>ROA</th>
                <th>Asset Turnover</th>
              </thead>
              <tbody>
                <tr>
                  <td>FYE</td>
                  <td>Stock</td>
                  <td>
                    PE<br/>
                    Book Value
                  </td>
                  <td>
                    DY<br/>
                    DPS
                  </td>
                  <td>EPS</td>
                  <td>Net Profit GR</td>
                  <td>Revenue</td>
                  <td>Cash</td>
                  <td>
                    Short Term Loan<br/>
                    Long Term Loan
                  </td>
                  <td>
                    Gearing<br/>
                    Debt/Equity
                  </td>
                  <td>FCF</td>
                  <td>GP Cashflow</td>
                  <td>Net Margin</td>
                  <td>ROE</td>
                  <td>ROA</td>
                  <td>Asset Turnover</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Intrinstic Value</h3>
            <table class="table">
              <tr>
                <td>5-yr average</td>
                <td>
                  5-yr average EPS<br/>
                  5-yr average PE<br/>
                  5-yr average DY
                </td>
              </tr>
              <tr>
                <td>Projected 5-yr accumulate earning and dividend</td>
                <td>
                  Projected 5-yr accumulate dividend<br/>
                  Projected 5-yr accumulate EPS
                </td>
              </tr>
              <tr>
                <td>Estimate Price</td>
                <td>Estimate Price</td>
              </tr>
              <tr>
                <td>Current Intrinsic Value</td>
                <td>Current Intrinsic Value</td>
              </tr>
            </table>
        </div>
      </div>
      <div class="col-md-6 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Fair Value</h3>
            <table class="table">
              <tr>
                <td>52 week price</td>
                <td>
                  High<br/>
                  Low
                </td>
              </tr>
              <tr>
                <td>Current Price</td>
                <td>RM 1.00</td>
              </tr>
              <tr>
                <td>Fair Value</td>
                <td>RM 1.00</td>
              </tr>
            </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Fundamental Analysis</h3>
            <table class="table">
              <thead>
                <th></th>
                <th>Avg</th>
                <th>Now</th>
              </thead>
              <tbody>
                <tr>
                  <td>ROE > 15%</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>EPS GR > 15%</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Debt/Equity < 0.5</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Net Margin > 15%</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>GP Cashflow > 0.88</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Gearing < 1.5</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <div class="col-md-4 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Buffett Approach</h3>
            <table class="table">
              <tbody>
                <tr>
                  <td>Business Sexines</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Supplier No.</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Customer Choices</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Entry Barrier</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Substitute</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Competition No.</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Competitiveness</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>FPE < 25</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Gearing < 1.5</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>GP Cashflow > 0.88</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Good Will</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Customer Loyalty</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <div class="col-md-4 section-heading mb50">
        <div class="probootstrap-box">
            <div class="icon"><i class="icon-presentation"></i></div>
            <h3>Fisher Approach</h3>
            <table class="table">
              <tbody>
                <tr>
                  <td>Future Grow</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Competitiveness</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Net Margin > 15%</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>GP Cashflow > 0.88</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Marginal Cost (R&D Important)</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Leadership</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Talent</td>
                  <td>x</td>
                  <td>x</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END: section -->
@endsection

@push('scripts')
<script src="{{ asset('asset/sublime/js/scripts.min.js') }}"></script>
<script src="{{ asset('asset/sublime/js/main.min.js') }}"></script>
<script src="{{ asset('asset/sublime/js/custom.js') }}"></script>
@endpush