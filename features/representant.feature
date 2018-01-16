Feature: Managing users
  @javascript @db @representant
  Scenario: Viewing a login page
    Given I am logged in as an admin
    Then I am viewing a post:
       | post_type | post_title      | post_content    | post_status |
       | page      | My login page   | [vc_row content_placement="middle" columns_type="boxes" height="full" valign="center" us_bg_image="4944" us_bg_overlay_color="rgba(53,47,41,0.71)"][vc_column width="1/3" offset="vc_col-sm-offset-4" css=".vc_custom_1487870150930{background-color: #ffffff !important;}"][vc_widget_sidebar sidebar_id="us_widget_area_login_widget"][/vc_column][/vc_row] | publish     |
    Then I should see "My login page"
    And I should see "Admin"