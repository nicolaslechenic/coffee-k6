<?php

require_once('./app/models/Waiter.php');

beforeEach(function() {
    Waiter::clean();
});

describe('->all()', function() {
    it("return 0 for empty array of Waiters", function () {
        // Assert
        assert(count(Waiter::all()) === 0);
    });
});

describe('->save()', function() {
    it("return 1 with created Waiter", function () {
        // Arrange
        $data = ['name' => 'Pikachu'];
        $waiter = new Waiter($data);
    
        // Act
        $waiter->save();

        // Assert
        assert(count(Waiter::all()) === 1);
    });
});


