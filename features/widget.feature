Feature: Widgets

  @db @widget
  Scenario: Viewing a widget
    Given I have the "meta" widget in "Default Sidebar"
      | Title     |
      | My widget |
    And I am on "/blog"
    Then I should see "My widget"
