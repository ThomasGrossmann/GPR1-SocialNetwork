<?php

namespace SocialNetwork;

use PHPUnit\Framework\Constraint\Count;
use RuntimeException;

require 'IObservable.php';

class Twitter implements IObservable
{
    private $observers;
    private $twits;

    public function __construct(array $observers = null, array $twits = null)
    {
        $this->observers = $observers;
        $this->twits = $twits;
    }

    public function subscribe(array $observers): void
    {
        self::setObservers($observers);
    }

    public function unsubscribe(IObserver $observer): void
    {
        throw new RuntimeException();
    }

    public function notifyObservers(): void
    {
        throw new EmptyListOfSubscribersException();
    }

    public function getObservers(): array
    {
        if($this->observers == null) {
            $this->observers = [];
        }
        return $this->observers;
    }

    public function setObservers($observers): array
    {
        return $this->observers = $observers;
    }

    public function getTwits(): array
    {
        if($this->twits == null) {
            $this->twits = [];
        }
        return $this->twits;
    }

    public function setTwits(): array
    {
        throw new RuntimeException();
    }
}

class TwitterException extends RuntimeException
{
}
class EmptyListOfSubscribersException extends TwitterException
{
}
class SubscriberAlreadyExistsException extends TwitterException
{
}
class SubscriberNotFoundException extends TwitterException
{
}