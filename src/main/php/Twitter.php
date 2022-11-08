<?php
declare(strict_types=1);

namespace SocialNetwork;

use RuntimeException;

require 'IObservable.php';

class Twitter implements IObservable
{
    //region private attributes
    private array $observers;
    private array $twits;

    //endregion private attributes

    public function __construct(array $observers = [], array $twits = [])
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
        if ($this->getObservers() == null) {
            throw new EmptyListOfSubscribersException();
        } else {
            $key = array_search($observer, $this->getObservers(), true);
            if ($key === false) {
                throw new SubscriberNotFoundException();
            }
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers(): void
    {
        throw new EmptyListOfSubscribersException();
    }

    public function getObservers(): array
    {
        return $this->observers;
    }

    public function setObservers($observers): array
    {
        foreach ($observers as $observer) {
            if (in_array($observer, $this->observers, true)) {
                throw new SubscriberAlreadyExistsException();
            } else {
                $this->observers[] = $observer;
            }
        }
        return $this->observers;
    }

    public function getTwits(): array
    {
        return $this->twits;
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