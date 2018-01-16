Feature: I have a Register Page
	@db @register @javascript
	Scenario: I have a register form in a page
		Given I am viewing a post:
    		| post_type | post_title | post_content | post_status |
    		| page      | Registration   | [register_representant]  | publish     |
    	Then I should see "Registering Representant"

    	When I fill in "name" with "xxx"
    	Then I should see "xxx"

