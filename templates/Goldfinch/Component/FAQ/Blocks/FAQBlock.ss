<% if Items.Count %>
<div class="container">
    <div class="row justify-content-center my-5">

        <div class="col-md-8">
            <%-- Filter --%>
            <form>
                <div class="mb-3">
                    <label for="faq-search-field" class="form-label">Search</label>
                    <input class="form-control" list="datalistOptions" id="faq-search-field" placeholder="Search in frequently asked questions...">
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
            </form>

            <div class="accordion" id="faqblock-{$Top.ID}">
                <% loop Items %>
                    <% if not Disabled %>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button<% if Up.FAQConfig.OpenFirst && Pos == 1 %> collapsed<% end_if %>" type="button" data-bs-toggle="collapse" data-bs-target="#faqblock-{$Top.ID}-item-{$ID}" aria-expanded="<% if Up.FAQConfig.OpenFirst && Pos == 1 %>true<% else %>false<% end_if %>" aria-controls="faqblock-{$Top.ID}-item-{$ID}">$Question</button>
                        </h2>
                    <div id="faqblock-{$Top.ID}-item-{$ID}" class="accordion-collapse collapse<% if Up.FAQConfig.OpenFirst && Pos == 1 %>  show<% end_if %>" data-bs-parent="#faqblock-{$Top.ID}">
                        <div class="accordion-body">$Answer</div>
                        </div>
                    </div>
                    <% end_if %>
                <% end_loop %>
            </div>
        </div>

    </div>
</div>
<% end_if %>
