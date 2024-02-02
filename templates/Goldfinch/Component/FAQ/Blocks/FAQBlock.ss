<% if Items.Count %>
  <%-- Filter --%>
  <%-- <form>
    <div class="mb-3">
      <label for="faq-search-field" class="form-label">Search</label>
      <input
        class="form-control"
        list="datalistOptions"
        id="faq-search-field"
        placeholder="Search in frequently asked questions..."
      />
    </div>
    <% if Categories %>
    <div class="mb-3">
      <select class="form-select" aria-label="FAQ Categories">
        <option selected>-</option>
        <% loop Categories %>
        <option value="$URLSegment">$Title</option>
        <% end_loop %>
      </select>
    </div>
    <% end_if %>
  </form> --%>

  <% if Items %>

    <form id="faqform" style="display: block; margin-bottom: 70px">
      <div style="margin-bottom: 10px">
        <input type="text" class="text" name="search" minlength="3" placeholder="Search" value="">
      </div>
      <% if not FAQConfig.DisabledCategories %>
        <% if Categories %>
          <div style="margin-bottom: 10px">
            <select name="category">
            <option value>Select category</option>
            <% loop Categories %><option value="{$URLSegment}"<% if paramGet(category) == $URLSegment %> selected<% end_if %>>$Title</option><% end_loop %>
            </select>
          </div>
        <% end_if %>
      <% end_if %>
    </form>

    <script type="text/javascript">

      document.addEventListener('DOMContentLoaded', () => {

        const form = document.getElementById('faqform');
        const searchField = form.querySelector('[name="search"]');
        const categoryField = form.querySelector('[name="category"]');
        const stockElement = document.getElementById('faqlist');

        var currentData = [];

        if (stockElement && stockElement.getAttribute('data-json')) {
          currentData['list'] = JSON.parse(stockElement.getAttribute('data-json'));
        }

        function liveFilter(e, key) {
          currentData[key] = e

          console.log(currentData)
        }

        if (searchField) {
          searchField.addEventListener('input', (e) => {
            liveFilter(e.target.value, 'search')
          })
        }

        if (categoryField.length) {
          categoryField.addEventListener('change', (e) => {
            liveFilter(e.target.value, 'category')
          })
        }

      });
    </script>

    <ul id="faqlist" data-json="$Items.toJson(Question, Answer, 'Categories:Title,URLSegment')">
      <% loop Items %>
        <% if not Disabled %>
          <li data-id="{$URLSegment}"><a href="#{$URLSegment}">$Question</a></li>
        <% end_if %>
      <% end_loop %>
    </ul>
    <% include Goldfinch/Nest/Partials/Pagination %>
  <% else %>
    <p>Sorry, there are no questions that match your request</p>
  <% end_if %>

  <%-- FAQ list in accordion --%>
  <%-- <div class="accordion" id="faqblock-{$Top.ID}">
    <% loop Items %>
      <% if not Disabled %>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button
              class="accordion-button<% if Up.FAQConfig.OpenFirst && Pos == 1 %> collapsed<% end_if %>"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faqblock-{$Top.ID}-item-{$ID}"
              aria-expanded="<% if Up.FAQConfig.OpenFirst && Pos == 1 %>true<% else %>false<% end_if %>"
              aria-controls="faqblock-{$Top.ID}-item-{$ID}"
            >
              $Question
            </button>
          </h2>
          <div
            id="faqblock-{$Top.ID}-item-{$ID}"
            class="accordion-collapse collapse<% if Up.FAQConfig.OpenFirst && Pos == 1 %> show<% end_if %>"
            data-bs-parent="#faqblock-{$Top.ID}"
          >
            <div class="accordion-body">$Answer</div>
          </div>
        </div>
      <% end_if %>
    <% end_loop %>
  </div> --%>
<% end_if %>
