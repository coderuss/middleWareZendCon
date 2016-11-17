<?php

use Laracasts\Integrated\Extensions\Selenium as IntegrationTest;

class ExampleTest extends IntegrationTest
{

    /** test */
    function it_verifies_that_pages_load_properly()
    {
        $this->visit('/');
    }

    /** test */
    function it_follows_links()
    {
        $this->visit('/page-1')
             ->click('Follow Me')
             ->andSee('You are on Page 2')
             ->onPage('/page-2');
    }

    /** @test */
    function it_submits_forms()
    {
        $this->visit('page-with-form')
             ->submitForm('Submit', ['title' => 'Foo Title'])
             ->andSee('You entered Foo Title')
             ->onPage('/page-with-form-results');

        // Another way to write it.
        $this->visit('page-with-form')
             ->type('Foo Title', '#title')
             ->press('Submit')
             ->see('You Entered Foo Title');
    }

    /** @test */
    function it_verifies_information_in_the_database()
    {
        $this->visit('database-test')
             ->type('Testing', 'name')
             ->press('Save to Database')
             ->verifyInDatabase('things', ['name' => 'Testing']);
    }

}