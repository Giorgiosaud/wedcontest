Feature: Config Wedcontest
	@db @config @javascript
	Scenario: I can see Webhook Config Options
		Given I am logged in as an admin
		And I am on the dashboard
		When I go to the menu "Wedcontest > Wedcontest Webhook Setup"
    	Then I should see "My Webhook Settings"
    