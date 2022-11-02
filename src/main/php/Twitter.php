<?php declare(strict_types=1);

namespace SocialNetwork;

use RuntimeException;

require 'IObservable.php';

class Twitter implements IObservable
{
    //region private attributes
    private array $observers = array();
    //endregion private attributes

    public function __construct(array $observers = array())
    {
        throw new RuntimeException();
    }

    public function subscribe(array $observers):void
    {
        throw new RuntimeException();
    }

    public function unsubscribe(IObserver $observer):void
    {
        throw new RuntimeException();
    }

    public function notifyObservers():void
    {
        throw new RuntimeException();
    }

    public function getObservers():array
    {
        return $this->observers;
    }

    public function getTwits():array
    {
        throw new RuntimeException();
    }
}

class TwitterException extends RuntimeException { }
class EmptyListOfSubscribersException extends TwitterException { }
class SubscriberAlreadyExistsException extends TwitterException { }
class SubscriberNotFoundException extends TwitterException { }